/* ======================================================================= */
/* SCRIPTS
 /* ======================================================================= */

jQuery.fn.ctshowcaseWaveRender = function () {
    var $ = jQuery;
    $(this).addClass('rendered')
    var $window = $(window);

    /* =================================== */
    /* HELPER FUNCTIONS
     /* =================================== */

    /**
     * Detects whether an element is inside the viewport or not.
     * @param  {Element}  target    Target element
     * @param  {Number}  threshold  Visible area measured from the top of the element, from 0 to 1
     * @return {Boolean}            True if the element is visible
     */
    function isVisible(target, threshold, checkAbove) {
        if (!target) {
            return;
        }

        var rect = target[0].getBoundingClientRect();
        return (
                rect.top + (threshold || 0) * (rect.bottom - rect.top) <= $(window).height() &&
                (!checkAbove || (checkAbove && rect.bottom > (threshold || 0)))
                );
    }
    /**
     * Scrolls the document to a specific position.
     * @param  {Element}   target   Target element
     * @param  {Number}    offset   Offset from the target position
     * @param  {Function}  callback Function to call when the animation stops
     */
    function scrollTo(target, options) {
        $('html, body').animate({
            'scrollTop': (isNaN(target) ? $(target).offset().top + 1 : target) - (options.offset || 0)
        }, (options.duration || getScrollDurationTo(target)), (options.easing || 'easeInOutQuad'), options.callback);
    }

    /* =================================== */
    /* TRACK SCROLL POSITION
     /* =================================== */

    var scrollTop = $window.scrollTop();

    $window.on('scroll', function () {
        scrollTop = $window.scrollTop();
        is_scrolling = true;
    });
    /* =================================== */
    /* TEAM SECTION
     /* =================================== */


    /**
     * Prevents a function from being called too many times in a specified period of time
     * @param  {Function} fn Callback function
     */
    function throttle(fn, threshold) {
        var timeOut;

        return function () {
            clearTimeout(timeOut);
            timeOut = setTimeout(function () {
                fn.call(this, Array.prototype.slice.call(arguments));
            }.bind(this), threshold || 300);
        }.bind(this);
    }

    /**
     * Converts hex colors to RGB values
     * @param  {String} hex Hex Color
     * @return {Object}     RGB Object
     */
    function getRGB(hex) {
        var arrBuff = new ArrayBuffer(4);
        var vw = new DataView(arrBuff);
        vw.setUint32(0, parseInt(hex.slice(1), 16), false);
        var arrByte = new Uint8Array(arrBuff);

        return {
            r: arrByte[1],
            g: arrByte[2],
            b: arrByte[3],
            toString: function () {
                return arrByte[1] + ',' + arrByte[2] + ',' + arrByte[3];
            }
        };
    }

    /* =================================== */
    /* ANIMATION POLYFILLS
     /* =================================== */

    /* request animation frame */
    var raf = (function () {
        return  window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.msRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                function (callback) {
                    return window.setTimeout(callback, 1000 / 60);
                };
    })();

    /* cancel animation frame */
    var caf = (function () {
        return  window.cancelAnimationFrame ||
                window.webkitCancelAnimationFrame ||
                window.mozCancelAnimationFrame ||
                window.msCancelAnimationFrame ||
                window.oCancelAnimationFrame ||
                function (callback) {
                    window.clearTimeout(callback);
                };
    })();

    /* =================================== */
    /* TRACK MOUSE POSITION
     /* =================================== */

    var mouseX = 0;
    var mouseY = 0;

    $window.on('mousemove.mouseTracker', function (e) {
        mouseX = e.pageX;
        mouseY = e.pageY;
    });

    /* =================================== */
    /* TRACK WINDOW DIMENSIONS
     /* =================================== */

    var windowWidth = $window.width();
    var windowHeight = $window.height();

    $window.on('resize.windowTracker', throttle(function () {
        windowWidth = $window.width();
        windowHeight = $window.height();
    }));

    /* =================================== */
    /* TRACK SCROLL POSITION
     /* =================================== */

    var scrollTop = $window.scrollTop();

    $window.on('scroll', function () {
        scrollTop = $window.scrollTop();
    });

    /* ------------------------ */
    /* CELL
     /* ------------------------ */

    var Cell = function (elem) {
        this.elem = $(elem);

        // initialize values
        this.x = 0;
        this.y = 0;
        this.targetX = 0; // target position
        this.targetY = 0; // target position
        this.originX = 0; // original (unchanged) target position
        this.originY = 0; // original (unchanged) target position
        this.ox = this.x; // old x position
        this.oy = this.y; // old y position
        this.vx = 0; // x velocity
        this.vy = 0; // y velocity
        this.radius = 45;
        this.friction = 0.96;
        this.stiffness = 10;
        this.damping = 0.1;
        this.stableStiffness = 300;
        this.stableDamping = 1000;
        this.stable = true; // not being thrown around or hit
        this.dragging = false; // not being dragged
        this.startedDragging = false; // might have clicked but hasn't started actually dragging
        this.initialDragState = {}; // object state when the user started dragging

        // handle mouse click
        this.elem.on('click.cell', function () {
            return false;
        });

        // handle dragging
        this.elem.on('mousedown.cell', this.drag.bind(this));

        // handle mouseover/mouseout
        this.elem.on('mouseenter.cell', function (e) {
            this.elem.addClass('is-mouseover');

            if (this.onMouseEnter) {
                this.onMouseEnter.call(this, e);
            }
        }.bind(this));

        this.elem.on('mouseleave.cell', function (e) {
            this.elem.removeClass('is-mouseover');

            if (this.onMouseLeave) {
                this.onMouseLeave.call(this, e);
            }
        }.bind(this));
    }

    Cell.prototype = {
        setPosition: function (x, y) {
            this.x = this.targetX = x;
            this.y = this.targetY = y;
        },

        drag: function (e) {
            this.initialDragState = {
                x: this.x,
                y: this.y,
                mx: mouseX,
                my: mouseY
            };

            this.dragging = true;
            this.stable = false;

            $(window)
                    .off('mouseup.cell')
                    .on('mouseup.cell', function (e) {
                        if (!this.startedDragging) {
                            this.stable = true;

                            if (this.onClick) {
                                this.onClick.call(this, e);
                            }
                        }

                        $(window).off('mouseup.cell');

                        this.dragging = false;
                        this.startedDragging = false;

                        this.elem.removeClass('is-dragging');

                        return false;
                    }.bind(this));

            return false;
        },

        update: function () {
            if (this.dragging) {
                var tx = this.initialDragState.x + (mouseX - this.initialDragState.mx);
                var ty = this.initialDragState.y + (mouseY - this.initialDragState.my);

                this.x += (tx - this.x) / 9;
                this.y += (ty - this.y) / 9;

                this.vx = this.x - this.ox;
                this.vy = this.y - this.oy;

                if ((this.x !== this.ox || this.y !== this.oy) && !this.elem.hasClass('is-dragging')) {
                    this.elem.addClass('is-dragging');
                    this.startedDragging = true;
                }
            } else {
                var stiffness = this.stable ? this.stableStiffness : this.stiffness;
                var damping = this.stable ? this.stableDamping : this.damping;

                var springX = -stiffness * (this.x - this.targetX);
                var damperX = -damping * this.vx;
                this.vx += 0.025 * (springX + damperX) / this.radius;

                var springY = -stiffness * (this.y - this.targetY);
                var damperY = -damping * this.vy;
                this.vy += 0.025 * (springY + damperY) / this.radius;

                this.x += this.vx;
                this.y += this.vy;

                this.vx *= this.friction;
                this.vy *= this.friction;

                var dx = this.x - this.ox;
                var dy = this.y - this.oy;

                if (Math.sqrt(dx * dx + dy * dy) < 0.005) {
                    this.stable = true;
                }
            }

            this.ox = this.x;
            this.oy = this.y;
        },

        render: function () {
            this.elem.css('transform', 'translate3d(' + this.x + 'px, ' + this.y + 'px, 0)');

        },

        getHitTest: function (cell) {
            var aabb = (
                    this.x + this.radius > cell.x - cell.radius &&
                    this.x - this.radius < cell.x + cell.radius &&
                    this.y + this.radius > cell.y - cell.radius &&
                    this.y - this.radius < cell.y + cell.radius
                    );

            if (!aabb) {
                return false;
            }

            var dx = cell.x - this.x;
            var dy = cell.y - this.y;
            var distance = Math.sqrt(dx * dx + dy * dy);
            var minDistance = this.radius + cell.radius;

            if (distance > minDistance) {
                return false;
            }

            return {
                dx: dx,
                dy: dy,
                distance: distance,
                minDistance: minDistance
            };
        },

        resolveCollision: function (cell, hitTest) {
            this.stable = false;
            cell.stable = false;

            var f = hitTest.minDistance - hitTest.distance;
            var angle = Math.atan2(hitTest.dy, hitTest.dx);

            this.x -= 0.5 * f * Math.cos(angle);
            this.y -= 0.5 * f * Math.sin(angle);

            cell.x += 0.5 * f * Math.cos(angle);
            cell.y += 0.5 * f * Math.sin(angle);

            var c = {
                vx: (this.vx + cell.vx) / 2,
                vy: (this.vy + cell.vy) / 2
            };

            var ux = this.vx - c.vx;
            var uy = this.vy - c.vy;

            var ur = (ux * hitTest.dx + uy * hitTest.dy) / hitTest.distance;

            if (ur <= 0) {
                return;
            }

            var urx = ur * hitTest.dx / hitTest.distance;
            var ury = ur * hitTest.dy / hitTest.distance;

            this.vx -= 2 * urx;
            this.vy -= 2 * ury;

            cell.vx += 2 * urx;
            cell.vy += 2 * ury;
        }
    }
    // update cells on resize
    $window.on('resize', throttle(function () {

        cells.forEach(function (cell, i) {
            setCellPosition(cell, positions[i]);

            cell.originX = getCelltargetX(positions[i].x);
            cell.originY = getCelltargetY(positions[i].y);
        });

        clearActiveCell();
    }));

    $window.on('scroll', function () {
        clearActiveCell();
    });

    // set cell position
    function setCellPosition(cell, position) {
        cell.setPosition(
                getCelltargetX(position.x),
                getCelltargetY(position.y)
                );
    }

    function getCelltargetX(pos) {
        return pos;
    }

    function getCelltargetY(pos) {
        return 0.5 * $window.height() + (0.4 * $window.height() * pos / 100);
    }



    function onMouseEnterCell() {
        clearTimeout(mouseOverCellTimeout);

        mouseOverCellTimeout = setTimeout(function () {
            if (this.stable) {
                setActiveCell(this);
            }
        }.bind(this), 500);
    }

    function onMouseLeaveCell() {
        clearTimeout(mouseOverCellTimeout);
        clearActiveCell();
    }

    function onClickCell() {
        clearTimeout(mouseOverCellTimeout);
        setActiveCell(this);
    }

    function setActiveCell(cell) {
        activeCell = cell;
        var activeCellHtml = activeCell.elem.find('.ctshowcase-team-member__info').html();

        var layout = cell.elem.closest('.ctshowcase-wave-layout');
        var activeTeamMember = layout.find('.active-ctshowcase-team-member');
        connector = layout.find('.ctshowcase-connector');
        connectorStart = layout.find('.ctshowcase-connector .ctshowcase-connector__start');
        connectorLine = layout.find('.ctshowcase-connector__line');
        connectorEnd = layout.find('.ctshowcase-connector .ctshowcase-connector__end');

        connector.addClass('is-active');
        connector.attr('data-type', cell.elem.data('type'));
        connectorStart.css('background', cell.elem.attr('data-bgcolor'))
        connectorEnd.css('background', cell.elem.attr('data-bgcolor'))
        connectorLine.css('background', cell.elem.attr('data-bgcolor'))
        layout.addClass('has-active-member').attr('data-active-member', cell.elem.data('type'));
        activeTeamMember.html(activeCellHtml);

    }

    function clearActiveCell() {
        activeCell = null;

        connector.removeClass('is-active');
        connector.removeAttr('data-type');
        connectorLine.css('width', '');

        $('.ctshowcase-wave-layout').removeClass('has-active-member');
    }
    function detectIE() {
        var ua = window.navigator.userAgent;

        var msie = ua.indexOf('MSIE ');
        if (msie > 0) {
            // IE 10 or older => return version number
            return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
        }

        var trident = ua.indexOf('Trident/');
        if (trident > 0) {
            // IE 11 => return version number
            var rv = ua.indexOf('rv:');
            return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
        }

        var edge = ua.indexOf('Edge/');
        if (edge > 0) {
            // Edge (IE 12+) => return version number
            return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
        }

        // other browser
        return false;
    }
    function watchAndAnimate(layout, layoutSelector, cells) {
        connector = layoutSelector.find('.ctshowcase-connector');
        connectorStart = layoutSelector.find('.ctshowcase-connector .ctshowcase-connector__start');
        connectorLine = layoutSelector.find('.ctshowcase-connector__line');
        connectorEnd = layoutSelector.find('.ctshowcase-connector .ctshowcase-connector__end');

        raf(function tick() {
            if (!$('.ctshowcase-wave-layout.rendered').length) {
                return;
            }
            if (window.matchMedia('(min-width: 768px)').matches) {

                var teamSectionWidth = layoutSelector.width();
                var teamSectionHeight = layoutSelector.height();
                var v = ($window.scrollTop() - layoutSelector.offset().top) / (teamSectionHeight - windowHeight);
                if (v <= -0.2 || v >= 1.2) {
                    layoutSelector.find('.ctshowcase-section-title').addClass('is-hidden');
                    $(layoutSelector.find('.ctshowcase-section-title, .active-ctshowcase-team-member  , .ctshowcase-team')).
                    css('z-index', -111111);
                    $(layoutSelector.find('.active-ctshowcase-team-member  , .ctshowcase-team')).hide().css('transform', 'translate3d(0, ' + -0.3 * windowHeight * vy + 'px, 0)');

                    return raf(tick);
                }
                if (v <= 0 || v >= 1) {
                    $(layoutSelector.find('.ctshowcase-section-title, .active-ctshowcase-team-member  , .ctshowcase-team')).
                            css('z-index', -111111);
                    $(layoutSelector.find('.active-ctshowcase-team-member  , .ctshowcase-team')).hide().css('transform', 'translate3d(0, ' + -0.3 * windowHeight * vy + 'px, 0)');

                } else {
                    $(layoutSelector.find('.active-ctshowcase-team-member  , .ctshowcase-team ')).show().css('transform', 'translate3d(0, ' + -0.3 * windowHeight * vy + 'px, 0)');

                    $(layoutSelector.find('.ctshowcase-section-title , .active-ctshowcase-team-member  , .ctshowcase-team')).css('z-index', 0);

                }
               
                if (!isVisible(layout, 0, true)) {
                    return raf(tick);
                }
                

                if (v > 0) {
                    layoutSelector.find('.ctshowcase-section-title h4 ,.ctshowcase-section-title p').css('visibility', 'visible');
                    layoutSelector.find('.ctshowcase-section-title').addClass('is-visible').removeClass('is-hidden');

                } else {
                    layoutSelector.find('.ctshowcase-section-title').addClass('is-hidden');
                }

                if (v > 0.95) {
                    var vy = (v - 0.95) / 0.1;

                    layoutSelector.find('.ctshowcase-section-title h4').css({
                        'transition': 'none',
                        'opacity': 1 - vy,
                        'transform': 'translate3d(0, ' + -0.25 * windowHeight * vy + 'px, 0)',
                    });

                    layoutSelector.find('.ctshowcase-section-title p').css({
                        'transition': 'none',
                        'opacity': 1 - vy,
                        'transform': 'translate3d(0, ' + -0.3 * windowHeight * vy + 'px, 0)',
                    });
                } else {
                    layoutSelector.find('.ctshowcase-section-title h4').css({
                        'transition': '',
                        'opacity': '',
                        'transform': '',
                    });

                    layoutSelector.find('.ctshowcase-section-title p').css({
                        'transition': '',
                        'opacity': '',
                        'transform': '',
                    });
                }

                if (layoutSelector.hasClass('is-rtl')) {
                    cellsPositionX = v * (2 * cellsWidth) - cellsWidth;
                } else {
                    cellsPositionX = cellsWidth - v * (2 * cellsWidth);
                }


                layoutSelector.find('.ctshowcase-team-members').css('transform', 'translate3d(' + cellsPositionX + 'px, 0, 0)');

                layoutSelector.find('.ctshowcase-team').css('background-position', cellsPositionX + 'px center');

                cells.forEach(function (cell) {
                    cell.update();

                    if (!cell.dragging) {
                        var a = 0.01 * $window.width() - 100;
                        var b = 0.99 * $window.width() + 100;
                        var cx = cell.x + cellsPositionX;

                        if (cx > a && cx < b) {
                            var y = -80 * Math.sin((cx - a) * Math.PI / (b - a));

                            if (!cell.randomY) {
                                cell.randomY = Math.random() * 30 - 15;
                            }

                            if (cell.targetY < 0.5 * $window.height()) {
                                cell.targetY = Math.min(getCelltargetY(y + cell.randomY), cell.originY);
                            } else {
                                cell.targetY = Math.max(getCelltargetY(-(y + cell.randomY)), cell.originY);
                            }
                        }
                    }
                });

                var collidingCellsA = [];
                var collidingCellsB = [];
                var hitTests = [];

                cells.forEach(function (cellA) {
                    if (collidingCellsB.indexOf(cellA) === -1) {
                        cells.forEach(function (cellB) {
                            if (cellA !== cellB) {
                                var hitTest = cellA.getHitTest(cellB);

                                if (hitTest) {
                                    collidingCellsA.push(cellA);
                                    collidingCellsB.push(cellB);
                                    hitTests.push(hitTest);
                                }
                            }
                        });
                    }
                });

                collidingCellsA.forEach(function (cell, i) {
                    cell.resolveCollision(collidingCellsB[i], hitTests[i]);
                });

                cells.forEach(function (cell) {
                    cell.render();

                });

                if (activeCell && !activeCell.dragging) {
                    var tw = 400;
                    var th = 150;
                    var tx = windowWidth / 2;
                    var ty = windowHeight / 2;
                    var tr = 0;
                    var cx = activeCell.x + cellsPositionX;
                    var cy = activeCell.y;
                    var dx = tx - cx;
                    var dy = ty - cy;
                    var angle = Math.atan2(dy, dx);
                    var connectorX = cx + 1.2 * activeCell.radius * Math.cos(angle);
                    var connectorY = cy + 1.2 * activeCell.radius * Math.sin(angle);
                    var connectorDX = tx - 0.5 * tw * Math.cos(angle) - connectorX;
                    var connectorDY = ty - 0.5 * th * Math.sin(angle) - connectorY;
                    var d = Math.sqrt(connectorDX * connectorDX + connectorDY * connectorDY);

                    connectorLine.width(d);
                    connector.css('transform-origin', connectorX + 'px ' + connectorY + 'px');
                    connector.css('transform', 'rotate(' + (180 * angle / Math.PI) + 'deg) translate3d(' + connectorX + 'px, ' + connectorY + 'px, 0)');
                }

                raf(tick);
            } else {
                $(layoutSelector.find('.active-ctshowcase-team-member  , .ctshowcase-team ')).show();
                $(layoutSelector.find('.ctshowcase-section-title , .active-ctshowcase-team-member  , .ctshowcase-team')).css('z-index', 0);
                layoutSelector.find('.ctshowcase-section-title h4 ,.ctshowcase-section-title p').css('visibility', 'visible');
                layoutSelector.find('.ctshowcase-section-title').addClass('is-visible').removeClass('is-hidden');
                return raf(tick);
            }

        });

    }
    var cells = [];
    var cellsWidth = $window.width();
    var cellRadius = 52.5;
    var cellsBaseX = 100;
    var cellsPositionX = 0;
    var layout = this;
    var layoutSelector = $(this);
    var positions = [];
    var activeCell = null;
    var mouseOverCellTimeout;
    var connector = null;
    var connectorStart = null;
    var connectorLine = null;
    var connectorEnd = null;
    renderWaveAnimation(this);


    function renderWaveAnimation(layout) {
        /* ------------------------ */
        /* CELLS ANIMATION
         /* ------------------------ */

        cells = [];
        cellsWidth = $window.width();
        cellRadius = 52.5;
        cellsBaseX = 100;
        cellsPositionX = 0;
        positions = [];
        layoutSelector = $(layout);



        // fill positions
        var n = layoutSelector.find('.ctshowcase-team-members > li').length;

        for (var i = 0; i < n; i++) {
            var pos = {
                x: cellsBaseX + Math.floor(i / 2) * 400 + (i % 2 === 0 ? 0 : 200),
                y: i % 2 === 0 ? 20 : -20
            };

            positions.push(pos);
            cellsWidth = Math.max(pos.x + cellRadius, cellsWidth);
        }
        if (layoutSelector.hasClass('is-rtl')) {
            positions = positions.reverse();
        }

        // setup cells
        layoutSelector.find('.ctshowcase-team-members > li').each(function (i) {
            if (i > positions.length - 1) {
                return;
            }
            var cell = new Cell(this);

            cell.radius = cellRadius;

            setCellPosition(cell, positions[i]);

            cell.originX = getCelltargetX(positions[i].x);
            cell.originY = getCelltargetY(positions[i].y);

            cell.onMouseEnter = onMouseEnterCell;
            cell.onMouseLeave = onMouseLeaveCell;
            cell.onClick = onClickCell;

            cells.push(cell);
        });



        // handle active cell
        activeCell = null;
        mouseOverCellTimeout;



        // animate
        watchAndAnimate(layout, layoutSelector, cells)


        if (detectIE() != false) {
            $('html').css({
                'height': '100%',
                'overflow': 'hidden'
            });
            $('body').css({
                'height': '100%',
                'overflow': 'auto'
            })
        }


    }
}

jQuery(document).ready(function ($) {
    $('.ctshowcase-wave-layout:not(.rendered)').each(function () {
        $(this).ctshowcaseWaveRender();

    })

})
