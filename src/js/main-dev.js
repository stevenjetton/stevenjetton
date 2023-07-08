import "./navigation"
import "SLICK/slick.js"
import "MFP/jquery.magnific-popup.js"
;(function ($) {
  $(document).ready(function () {
    $("#primary-nav-toggle").on("click", function slideMenu(e) {
      // console.log("burger click");
      let $this = $(this)
      let expanded = $this.attr("aria-expanded") == "true" || false
      $this.attr("aria-expanded", !expanded)
      $this.siblings(".menu-main-menu-container").toggleClass("open")
    })

    $("#primary-nav-toggle").on("click", function (e) {
      var x = document.getElementById("primary-nav-toggle").getAttribute("aria-expanded")
      if (x == "true") {
        x = "false"
      } else {
        x = "true"
      }
      document.getElementById("primary-nav-toggle").setAttribute("aria-expanded", x)
    })

    var matchPair = document.getElementById("chiasm-bookends")

    $("#add-layer").on("click", function () {
      const box = `
      <section class='bookends-section'>
        <div class='bookends'>
          <div class="bookendA">
            <textarea id="story" name="story"
            rows="2" cols="33">
            </textarea>
          </div>
          <div class="bookendA">
            <textarea id="story" name="story"
            rows="2" cols="33">
            </textarea>
          </div>
        </div>
      </section>`

      matchPair.innerHTML = box
    })
    // var text = ["know my bible courses", "encouragement", "prayer", "prophetic stewardship"]
    // var counter = 0
    // var elem = document.getElementById("changeText")
    // var inst = setInterval(change, 2000)
    // function change() {
    //   elem.innerHTML = text[counter]
    //   counter++
    //   if (counter >= text.length) {
    //     counter = 0
    // clearInterval(inst) // uncomment this if you want to stop refreshing after one cycle
    //   }
    // }

    // $(".single .content-container .article p:first-child").addClass("clearfix")
  })
})(jQuery)
