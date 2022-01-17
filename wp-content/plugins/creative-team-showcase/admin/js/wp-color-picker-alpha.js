/**!
 * wp-color-picker-alpha
 *
 * Overwrite Automattic Iris for enabled Alpha Channel in wpColorPicker
 * Only run in input and is defined data alpha in true
 *
 * Version: 3.0.0
 * https://github.com/kallookoo/wp-color-picker-alpha
 * Licensed under the GPLv2 license or later.
 */
!(function(e, a) {
  var l,
    o = { version: 300 };
  if (
    "wpColorPickerAlpha" in window &&
    "version" in window.wpColorPickerAlpha
  ) {
    var t = parseInt(window.wpColorPickerAlpha.version, 10);
    if (!isNaN(t) && o.version <= t) return;
  }
  Color.fn.hasOwnProperty("to_s") ||
    ((Color.fn.to_s = function(o) {
      "hex" === (o = o || "hex") && this._alpha < 1 && (o = "rgba");
      var a = "";
      return (
        "hex" === o
          ? (a = this.toString())
          : this.error ||
            (a = this.toCSS(o)
              .replace(/\(\s+/, "(")
              .replace(/\s+\)/, ")")),
        a
      );
    }),
    (window.wpColorPickerAlpha = o),
    (l =
      "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAIAAAHnlligAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAHJJREFUeNpi+P///4EDBxiAGMgCCCAGFB5AADGCRBgYDh48CCRZIJS9vT2QBAggFBkmBiSAogxFBiCAoHogAKIKAlBUYTELAiAmEtABEECk20G6BOmuIl0CIMBQ/IEMkO0myiSSraaaBhZcbkUOs0HuBwDplz5uFJ3Z4gAAAABJRU5ErkJggg=="),
    e.widget("a8c.iris", e.a8c.iris, {
      alphaOptions: { alphaEnabled: !1 },
      _getColor: function(o) {
        return (
          o === a && (o = this._color),
          this.alphaOptions.alphaEnabled
            ? ((o = o.to_s(this.alphaOptions.alphaColorType)),
              this.alphaOptions.alphaColorWithSpace ||
                (o = o.replace(/\s+/g, "")),
              o)
            : o.toString()
        );
      },
      _create: function() {
        try {
          this.alphaOptions = this.element.wpColorPicker(
            "instance"
          ).alphaOptions;
        } catch (o) {}
        e.extend({}, this.alphaOptions, {
          alphaEnabled: !1,
          alphaCustomWidth: 130,
          alphaReset: !1,
          alphaColorType: "hex",
          alphaColorWithSpace: !1
        }),
          this._super();
      },
      _addInputListeners: function(i) {
        function o(o) {
          var a = i.val(),
            t = new Color(a),
            a = a.replace(/^(#|(rgb|hsl)a?)/, ""),
            r = l.alphaOptions.alphaColorType;
          i.removeClass("iris-error"),
            t.error
              ? "" !== a && i.addClass("iris-error")
              : ("hex" === r &&
                  "keyup" === o.type &&
                  a.match(/^[0-9a-fA-F]{3}$/)) ||
                (t.toIEOctoHex() !== l._color.toIEOctoHex() &&
                  l._setOption("color", l._getColor(t)));
        }
        var l = this;
        i.on("change", o).on("keyup", l._debounce(o, 100)),
          l.options.hide &&
            i.one("focus", function() {
              l.show();
            });
      },
      _initControls: function() {
        var t, o, a, r;
        this._super(),
          this.alphaOptions.alphaEnabled &&
            ((a = (o = (t = this).controls.strip.clone(!1, !1)).find(
              ".iris-slider-offset"
            )),
            (r = { stripAlpha: o, stripAlphaSlider: a }),
            o.addClass("iris-strip-alpha"),
            a.addClass("iris-slider-offset-alpha"),
            o.appendTo(t.picker.find(".iris-picker-inner")),
            e.each(r, function(o, a) {
              t.controls[o] = a;
            }),
            t.controls.stripAlphaSlider.slider({
              orientation: "vertical",
              min: 0,
              max: 100,
              step: 1,
              value: parseInt(100 * t._color._alpha),
              slide: function(o, a) {
                (t.active = "strip"),
                  (t._color._alpha = parseFloat(a.value / 100)),
                  t._change.apply(t, arguments);
              }
            }));
      },
      _dimensions: function(o) {
        if ((this._super(o), this.alphaOptions.alphaEnabled)) {
          for (
            var a = this,
              t = a.options,
              r = a.controls.square,
              o = a.picker.find(".iris-strip"),
              i = Math.round(a.picker.outerWidth(!0) - (t.border ? 22 : 0)),
              l = Math.round(r.outerWidth()),
              e = Math.round((i - l) / 2),
              s = Math.round(e / 2),
              n = Math.round(l + 2 * e + 2 * s);
            i < n;

          )
            (e = Math.round(e - 2)),
              (s = Math.round(s - 1)),
              (n = Math.round(l + 2 * e + 2 * s));
          r.css("margin", "0"), o.width(e).css("margin-left", s + "px");
        }
      },
      _change: function() {
        var o,
          a,
          t,
          r = this,
          i = r.active;
        r._super(),
          r.alphaOptions.alphaEnabled &&
            ((o = r.controls),
            (a = parseInt(100 * r._color._alpha)),
            (t = [
              "rgb(" +
                (t = r._color.toRgb()).r +
                "," +
                t.g +
                "," +
                t.b +
                ") 0%",
              "rgba(" + t.r + "," + t.g + "," + t.b + ", 0) 100%"
            ]),
            r.picker.closest(".wp-picker-container").find(".wp-color-result"),
            (r.options.color = r._getColor()),
            o.stripAlpha.css({
              background:
                "linear-gradient(to bottom, " +
                t.join(", ") +
                "), url(" +
                l +
                ")"
            }),
            i && o.stripAlphaSlider.slider("value", a),
            r._color.error ||
              r.element.removeClass("iris-error").val(r.options.color),
            r.picker
              .find(".iris-palette-container")
              .on("click.palette", ".iris-palette", function() {
                var o = e(this).data("color");
                r.alphaOptions.alphaReset &&
                  ((r._color._alpha = 1), (o = r._getColor())),
                  r._setOption("color", o);
              }));
      },
      _paintDimension: function(o, a) {
        var t = this,
          r = !1;
        t.alphaOptions.alphaEnabled &&
          "strip" === a &&
          ((r = t._color),
          (t._color = new Color(r.toString())),
          (t.hue = t._color.h())),
          t._super(o, a),
          r && (t._color = r);
      },
      _setOption: function(o, a) {
        var t = this;
        if ("color" !== o || !t.alphaOptions.alphaEnabled)
          return t._super(o, a);
        (a = "" + a),
          (newColor = new Color(a).setHSpace(t.options.mode)),
          newColor.error ||
            t._getColor(newColor) === t._getColor() ||
            ((t._color = newColor),
            (t.options.color = t._getColor()),
            (t.active = "external"),
            t._change());
      },
      color: function(o) {
        return !0 === o
          ? this._color.clone()
          : o === a
          ? this._getColor()
          : void this.option("color", o);
      }
    }),
    e.widget("wp.wpColorPicker", e.wp.wpColorPicker, {
      alphaOptions: { alphaEnabled: !1 },
      _getAlphaOptions: function() {
        var r = this.element,
          o = r.data("type") || this.options.type,
          i = r.data("defaultColor") || r.val(),
          l = {
            alphaEnabled: r.data("alphaEnabled") || !1,
            alphaCustomWidth: 130,
            alphaReset: !1,
            alphaColorType: "rgb",
            alphaColorWithSpace: !1
          };
        return (
          l.alphaEnabled && (l.alphaEnabled = r.is("input") && "full" === o),
          l.alphaEnabled &&
            ((l.alphaColorWithSpace = i && i.match(/\s/)),
            e.each(l, function(o, a) {
              var t = r.data(o) || a;
              switch (o) {
                case "alphaCustomWidth":
                  (t = t ? parseInt(t, 10) : 0), (t = isNaN(t) ? a : t);
                  break;
                case "alphaColorType":
                  t.match(/^(hex|(rgb|hsl)a?)$/) ||
                    (t =
                      i && i.match(/^#/)
                        ? "hex"
                        : i && i.match(/^hsla?/)
                        ? "hsl"
                        : a);
                  break;
                default:
                  t = !!t;
              }
              l[o] = t;
            })),
          l
        );
      },
      _create: function() {
        e.support.iris &&
          ((this.alphaOptions = this._getAlphaOptions()), this._super());
      },
      _addListeners: function() {
        if (!this.alphaOptions.alphaEnabled) return this._super();
        var t = this,
          r = t.element,
          i = t.toggler.is("a");
        (this.alphaOptions.defaultWidth = r.width()),
          this.alphaOptions.alphaCustomWidth &&
            r.width(
              parseInt(
                this.alphaOptions.defaultWidth +
                  this.alphaOptions.alphaCustomWidth,
                10
              )
            ),
          t.toggler.css({
            position: "relative",
            "background-image": "url(" + l + ")"
          }),
          i
            ? t.toggler.html('<span class="color-alpha" />')
            : t.toggler.append('<span class="color-alpha" />'),
          (t.colorAlpha = t.toggler
            .find("span.color-alpha")
            .css({
              width: "30px",
              height: "100%",
              position: "absolute",
              top: 0,
              "background-color": r.val()
            })),
          "ltr" === t.colorAlpha.css("direction")
            ? t.colorAlpha.css({
                "border-bottom-left-radius": "2px",
                "border-top-left-radius": "2px",
                left: 0
              })
            : t.colorAlpha.css({
                "border-bottom-right-radius": "2px",
                "border-top-right-radius": "2px",
                right: 0
              }),
          r.iris({
            change: function(o, a) {
              t.colorAlpha.css({
                "background-color": a.color.to_s(t.alphaOptions.alphaColorType)
              }),
                e.isFunction(t.options.change) &&
                  t.options.change.call(this, o, a);
            }
          }),
          t.wrap.on("click.wpcolorpicker", function(o) {
            o.stopPropagation();
          }),
          t.toggler.click(function() {
            t.toggler.hasClass("wp-picker-open") ? t.close() : t.open();
          }),
          r.change(function(o) {
            var a = e(this).val();
            (r.hasClass("iris-error") ||
              "" === a ||
              a.match(/^(#|(rgb|hsl)a?)$/)) &&
              (i && t.toggler.removeAttr("style"),
              t.colorAlpha.css("background-color", ""),
              e.isFunction(t.options.clear) && t.options.clear.call(this, o));
          }),
          t.button.click(function(o) {
            e(this).hasClass("wp-picker-default")
              ? r.val(t.options.defaultColor).change()
              : e(this).hasClass("wp-picker-clear") &&
                (r.val(""),
                i && t.toggler.removeAttr("style"),
                t.colorAlpha.css("background-color", ""),
                e.isFunction(t.options.clear) && t.options.clear.call(this, o),
                r.trigger("change"));
          });
      }
    }));
})(jQuery);
