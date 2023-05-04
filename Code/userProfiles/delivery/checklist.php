<?php 

include '../../Database/Config.php';

error_reporting(0);

session_start();

if (isset($_POST['submit'])) 
{
  echo 'Submit';
  // if(!empty($_POST['chk1'])) {

  //       foreach($_POST['chk1'] as $value){
  //           echo "value : ".$value.'<br/>';
  //       }
}

?>
<html>
<header>
    <h1 class="title">
        <a href="">Web Launch Checklist</a>
    </h1>
    <a href="../../LoginAuth/logout.php">LogOut</a>
    <div class="progress">
        <span class="progress__count">0/X</span>
        <input class="progress__reset" type="reset" value="Reset" title="Reset Checkboxes" tabindex="0" />


        <span class="progress__border"></span>
        <span class="progress__bar"></span>
    </div>
    <link rel="stylesheet" href="checklist.js" />

    <link rel="stylesheet" href="checklist.css" />
</header>

<body>

    <div class="container">
        <form method="post" action="" class="checklist">
            <section class="checklist">
                <div>
                    <h2 class="checklist__title">Performance</h2>
                    <span class="checklist__title-border"></span>
                    <span class="checklist__percentage-border"></span>
                    <ul class="checklist-container">
                        <li class="checklist-item">
                            <input id="" type="checkbox" name='chk1[]' /><label for="" class="checkbox"></label><span
                                class="checklist-item__title">Images Optimized</span>
                            <button class="checklist-item__expandbtn" aria-label="Toggle Info"
                                title="Toggle More Information">
                                <span class="line"></span>
                            </button>
                            <div class="info-container">
                                <div class="info">
                                    <ul>
                                        <li>
                                            Compress all your images using either web processors such as
                                            Optimizilla.com=
                                            and
                                            Compressor.io, or desktop apps such as
                                            FileOptimizer
                                            and
                                            ImageOptim.
                                        </li>
                                        <li>
                                            Generate the exact image size for each element instead of
                                            resizing it with CSS/HTML as this can be a heavy process for
                                            the browser to perform.
                                        </li>
                                        <li>
                                            Utilize
                                            Image
                                            Sprites
                                            to save on HTTP requests and bandwidth.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- <button type="submit" name="submit" value="submit" requied>Submit</button> -->

                    <script>
                    const checkboxValues =
                        JSON.parse(localStorage.getItem("checkboxValues")) || {},
                        buttons = Array.from(
                            document.querySelectorAll(".checklist-item__expandbtn")
                        ),
                        labels = Array.from(
                            document.querySelectorAll(".checklist-item__title")
                        ),
                        checkboxes = Array.from(
                            document.querySelectorAll('input[type="checkbox"]')
                        ),
                        checkboxesLength = checkboxes.length,
                        progress = document.querySelector(".progress__bar"),
                        counter = document.querySelector(".progress__count"),
                        reset = document.querySelector(".progress__reset");

                    function loadIds() {
                        for (let a = 0; a < checkboxesLength; a += 1) {
                            const b = (a) => a.replace(/[ ,.!?;:'-]/g, "");
                            (checkboxes[a].id = `${b(
                checkboxes[a].nextSibling.nextSibling.innerText
              ).toLowerCase()}`),
                            checkboxes[a].nextSibling.setAttribute(
                                "for",
                                `${b(
                    checkboxes[a].nextSibling.nextSibling.innerText
                  ).toLowerCase()}`
                            );
                        }
                    }

                    function updateStorage(a) {
                        (checkboxValues[a.id] = a.checked),
                        localStorage.setItem(
                            "checkboxValues",
                            JSON.stringify(checkboxValues)
                        );
                    }

                    function countChecked() {
                        if ("checkbox" === this.type) {
                            const a = this.parentNode.parentNode.parentNode,
                                b =
                                a.querySelectorAll("input:checked").length /
                                a.querySelectorAll(".checklist-item").length;
                            a.querySelector(
                                ".checklist__percentage-border"
                            ).style.transform = `scaleX(${b})`;
                        } else
                            Array.from(document.querySelectorAll(".checklist")).forEach(
                                (a) => {
                                    const b =
                                        a.querySelectorAll("input:checked").length /
                                        a.querySelectorAll(".checklist-item").length;
                                    a.querySelector(
                                        ".checklist__percentage-border"
                                    ).style.transform = `scaleX(${b})`;
                                }
                            );
                        let a = 0;
                        Array.from(document.querySelectorAll("input:checked")).forEach(
                                () => {
                                    a += 1;
                                }
                            ),
                            (counter.innerText = `${a}/${checkboxesLength}`),
                            (progress.style.transform = `scaleX(${a / checkboxesLength})`),
                            (checkboxValues.globalCounter = a),
                            updateStorage(this);
                    }

                    function loadValues() {
                        const a = checkboxValues.globalCounter || 0;
                        (counter.innerText = `${a}/${checkboxesLength}`),
                        Object.keys(checkboxValues).forEach((a) => {
                                "globalCounter" !== a &&
                                    (document.getElementById(a).checked = checkboxValues[a]);
                            }),
                            countChecked();
                    }

                    function toggleExpand() {
                        const a = this.parentNode;
                        a.querySelector(".line").classList.toggle("closed"),
                            a.classList.toggle("open");
                    }

                    function resetCheckboxes() {
                        this.classList.add("progress__reset--pressed"),
                            checkboxes.forEach((a) => (a.checked = !1)),
                            Object.keys(checkboxValues).forEach(
                                (a) => delete checkboxValues[a]
                            ),
                            countChecked();
                    }
                    window.onload = function() {
                        loadIds(),
                            loadValues(),
                            checkboxes.forEach((a) =>
                                a.addEventListener("click", countChecked)
                            ),
                            buttons.forEach((a) => a.addEventListener("click", toggleExpand)),
                            labels.forEach((a) => a.addEventListener("click", toggleExpand)),
                            reset.addEventListener("click", resetCheckboxes),
                            reset.addEventListener(
                                "animationend",
                                function() {
                                    this.classList.remove("progress__reset--pressed");
                                },
                                !1
                            ),
                            "serviceWorker" in navigator &&
                            navigator.serviceWorker.register("/sw.js", {
                                // navigator.serviceWorker.register('https://www.example.com/service-worker.js', {

                                scope: "/",
                            });
                    };
                    </script>
                </div>


        </form>
        </section>
        <section class="checklist">
            <h2 class="checklist__title">SEO</h2>
            <span class="checklist__title-border"></span>
            <span class="checklist__percentage-border"></span>
            <ul class="checklist-container">
                <li class="checklist-item">
                    <input id="" type="checkbox" /><label for="" class="checkbox"></label><span
                        class="checklist-item__title">Page-Specific Keywords Set</span>
                    <button class="checklist-item__expand" aria-label="Toggle Info" title="Toggle More Information">
                        <span class="line"></span>
                    </button>
                    <div class="info-container">
                        <div class="info">
                            While less important than it used to be, keyword targeting is
                            still one of the most common suggestions towards improving SEO
                            ranking. <br />
                            Include the keyword or phrase in the:
                            <ul>
                                <li>URL - Make sure it's short and semantically clear</li>
                                <li>
                                    Title Tag - Include keyword or phrase in beginning, max 70
                                    characters
                                </li>
                                <li>
                                    Meta Description - Unique on every page, max 155 characters
                                </li>
                                <li>H1 - One per page, less important to include keyword</li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="checklist-item">
                    <input id="" type="checkbox" /><label for="" class="checkbox"></label><span
                        class="checklist-item__title">Google Analytics &amp; Google Search Console Setup</span>
                    <button class="checklist-item__expand" aria-label="Toggle Info" title="Toggle More Information">
                        <span class="line"></span>
                    </button>

                    <div class="info-container">
                        <div class="info">
                            Google Analytics can help you target users and isolate problem
                            areas for your website. Philip Walton explains a
                            <a target="_blank" rel="noopener"
                                href="https://philipwalton.com/articles/the-google-analytics-setup-i-use-on-every-site-i-build/">GA
                                setup</a>
                            that he uses to "reap its full benefits". Remember to connect
                            your Search Console and Analytics! Note that Bing Webmaster
                            Tools are more important for U.S. targeted sites.
                        </div>
                    </div>
                </li>
                <li class="checklist-item">
                    <input id="" type="checkbox" /><label for="" class="checkbox"></label><span
                        class="checklist-item__title">XML Sitemap Created &amp; Submitted</span>
                    <button class="checklist-item__expand" aria-label="Toggle Info" title="Toggle More Information">
                        <span class="line"></span>
                    </button>

                    <div class="info-container">
                        <div class="info">
                            Tools such as
                            <a target="_blank" rel="noopener" href="https://www.xml-sitemaps.com/">XML-Sitemaps.com</a>
                            make generating a sitemap simple. Submit a sitemap to all the
                            search engines so they can more intelligently crawl your
                            website.
                        </div>
                    </div>
                </li>
                <li class="checklist-item">
                    <input id="" type="checkbox" /><label for="" class="checkbox"></label><span
                        class="checklist-item__title">Robots.txt Created</span>
                    <button class="checklist-item__expand" aria-label="Toggle Info" title="Toggle More Information">
                        <span class="line"></span>
                    </button>

                    <div class="info-container">
                        <div class="info">
                            A
                            <a target="_blank" rel="noopener" href="https://moz.com/learn/seo/robotstxt">robots.txt
                                file</a>
                            instructs robots which pages they can visit.
                        </div>
                    </div>
                </li>
                <li class="checklist-item">
                    <input id="" type="checkbox" /><label for="" class="checkbox"></label><span
                        class="checklist-item__title">Scanned for Broken Links &amp; Crawl Problems</span>
                    <button class="checklist-item__expand" aria-label="Toggle Info" title="Toggle More Information">
                        <span class="line"></span>
                    </button>

                    <div class="info-container">
                        <div class="info">
                            Use a tool such as
                            <a target="_blank" rel="noopener"
                                href="http://www.screamingfrog.co.uk/seo-spider/">Screaming Frog SEO Spider</a>
                            to crawl your website and evaluate various issues related to
                            SEO.
                        </div>
                    </div>
                </li>
                <li class="checklist-item">
                    <input id="" type="checkbox" /><label for="" class="checkbox"></label><span
                        class="checklist-item__title">Canonical Links Set</span>
                    <button class="checklist-item__expand" aria-label="Toggle Info" title="Toggle More Information">
                        <span class="line"></span>
                    </button>

                    <div class="info-container">
                        <div class="info">
                            If applicable set a canonical link on each page using an
                            absolute URL without query strings. You should redirect traffic
                            from www to non-www or vice-versa, lowercase, and remove the
                            trailing slash.
                        </div>
                    </div>
                </li>
                <li class="checklist-item">
                    <input id="" type="checkbox" /><label for="" class="checkbox"></label><span
                        class="checklist-item__title">Rich Snippets &amp; Structured Data Added</span>
                    <button class="checklist-item__expand" aria-label="Toggle Info" title="Toggle More Information">
                        <span class="line"></span>
                    </button>

                    <div class="info-container">
                        <div class="info">
                            <a target="_blank" rel="noopener"
                                href="https://raventools.com/site-auditor/seo-guide/schema-structured-data/">Structured
                                data</a>
                            allows search engines to better understand your HTML markup and
                            generate rich snippets for the results page.
                            <a target="_blank" rel="noopener"
                                href="https://moz.com/learn/seo/schema-structured-data">Rich Snippets</a>
                            don't directly affect your ranking but make the results page
                            much more appealing and feature rich to possible visitors.
                        </div>
                    </div>
                </li>
                <li class="checklist-item">
                    <input id="" type="checkbox" /><label for="" class="checkbox"></label><span
                        class="checklist-item__title">Facebook &amp; Twitter Cards Created</span>
                    <button class="checklist-item__expand" aria-label="Toggle Info" title="Toggle More Information">
                        <span class="line"></span>
                    </button>

                    <div class="info-container">
                        <div class="info">
                            Facebook's
                            <a target="_blank" rel="noopener"
                                href="https://developers.facebook.com/docs/sharing/opengraph">Open Graph</a>
                            and Twitter's
                            <a target="_blank" rel="noopener" href="https://dev.twitter.com/cards/overview">Cards</a>
                            allow you to make social sharing much more appealing to people
                            viewing the "share" on social media websites. Both
                            <a target="_blank" rel="noopener"
                                href="https://developers.facebook.com/tools/debug/">Facebook</a>
                            and
                            <a target="_blank" rel="noopener" href="https://cards-dev.twitter.com/validator">Twitter</a>
                            have tools to preview and debug your cards.
                        </div>
                    </div>
                </li>

                <li class="checklist-item">
                    <input id="" type="checkbox" /><label for="" class="checkbox"></label><span
                        class="checklist-item__title">Facebook &amp; Twitterrrrrrrrrrrrrrrr Cards Created</span>
                    <button class="checklist-item__expand" aria-label="Toggle Info" title="Toggle More Information">
                        <span class="line"></span>
                    </button>

                    <div class="info-container">
                        <div class="info">
                            Facebook's and Twitterrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr's allow you
                            to make social sharing much more appealing to people viewing the
                            "share" on social media websites. Both and have tools to preview
                            and debug your cards.
                        </div>
                    </div>
                </li>
            </ul>
            <script>
            const checkboxxValues =
                JSON.parse(localStorage.getItem("checkboxValues")) || {},
                buttonss = Array.from(
                    document.querySelectorAll(".checklist-item__expand")
                ),
                labelss = Array.from(
                    document.querySelectorAll(".checklist-item__title")
                ),
                checkboxess = Array.from(
                    document.querySelectorAll('input[type="checkbox"]')
                ),
                checkboxessLength = checkboxess.length,
                progresss = document.querySelector(".progress__bar"),
                counterr = document.querySelector(".progress__count"),
                resett = document.querySelector(".progress__reset");

            function loadIds() {
                for (let a = 0; a < checkboxessLength; a += 1) {
                    const b = (a) => a.replace(/[ ,.!?;:'-]/g, "");
                    (checkboxess[a].id = `${b(
                checkboxess[a].nextSibling.nextSibling.innerText
              ).toLowerCase()}`),
                    checkboxess[a].nextSibling.setAttribute(
                        "for",
                        `${b(
                    checkboxess[a].nextSibling.nextSibling.innerText
                  ).toLowerCase()}`
                    );
                }
            }

            function updateStorage(a) {
                (checkboxxValues[a.id] = a.checked),
                localStorage.setItem(
                    "checkboxxValues",
                    JSON.stringify(checkboxxValues)
                );
            }

            function countChecked() {
                if ("checkbox" === this.type) {
                    const a = this.parentNode.parentNode.parentNode,
                        b =
                        a.querySelectorAll("input:checked").length /
                        a.querySelectorAll(".checklist-item").length;
                    a.querySelector(
                        ".checklist__percentage-border"
                    ).style.transform = `scaleX(${b})`;
                } else
                    Array.from(document.querySelectorAll(".checklist")).forEach(
                        (a) => {
                            const b =
                                a.querySelectorAll("input:checked").length /
                                a.querySelectorAll(".checklist-item").length;
                            a.querySelector(
                                ".checklist__percentage-border"
                            ).style.transform = `scaleX(${b})`;
                        }
                    );
                let a = 0;
                Array.from(document.querySelectorAll("input:checked")).forEach(
                        () => {
                            a += 1;
                        }
                    ),
                    (counter.innerText = `${a}/${checkboxessLength}`),
                    (progresss.style.transform = `scaleX(${a / checkboxessLength})`),
                    (checkboxxValues.globalCounter = a),
                    updateStorage(this);
            }

            function loadValues() {
                const a = checkboxxValues.globalCounter || 0;
                (counterr.innerText = `${a}/${checkboxessLength}`),
                Object.keys(checkboxxValues).forEach((a) => {
                        "globalCounter" !== a &&
                            (document.getElementById(a).checked = checkboxxValues[a]);
                    }),
                    countChecked();
            }

            function toggleExpand() {
                const a = this.parentNode;
                a.querySelector(".line").classList.toggle("closed"),
                    a.classList.toggle("open");
            }

            function resetCheckboxes() {
                this.classList.add("progress__reset--pressed"),
                    checkboxess.forEach((a) => (a.checked = !1)),
                    Object.keys(checkboxxValues).forEach(
                        (a) => delete checkboxxValues[a]
                    ),
                    countChecked();
            }
            window.onload = function() {
                loadIds(),
                    loadValues(),
                    checkboxess.forEach((a) =>
                        a.addEventListener("click", countChecked)
                    ),
                    buttonss.forEach((a) =>
                        a.addEventListener("click", toggleExpand)
                    ),
                    labelss.forEach((a) => a.addEventListener("click", toggleExpand)),
                    resett.addEventListener("click", resetCheckboxes),
                    resett.addEventListener(
                        "animationend",
                        function() {
                            this.classList.remove("progress__reset--pressed");
                        },
                        !1
                    ),
                    "serviceWorker" in navigator &&
                    navigator.serviceWorker.register("/sw.js", {
                        scope: "/",
                    });
            };
            </script>
        </section>
    </div>
</body>

</html>