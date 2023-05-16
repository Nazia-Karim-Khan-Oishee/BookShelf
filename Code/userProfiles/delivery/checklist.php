<?php 

include '../../Database/Config.php';

error_reporting(0);

session_start();
$user_name =  $_SESSION['user_name'];

// echo "Submit";
if (isset($_POST['submit'])) 
{
    if(!empty($_POST['chk1'])) {
        
        foreach($_POST['chk1'] as $value){
            echo "value : ".$value.'<br/>';
        }
      }
}
if (isset($_POST['submit2'])) 
{
  if(!empty($_POST['chk2'])) {

        foreach($_POST['chk2'] as $value){
            echo "value : ".$value.'<br/>';
        }
      }
}

?>
<html>
<header>
    <link href="../../boxicons-2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="../../css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <!-- <script defer src="script.js"></script> -->
    <?php
    require 'navbar.php';
    Navbar();
    ?>
    <br>
    <br>
    <br>
    <h6 class="title">Welcome back <?php echo $user_name ?>

        <!-- <a href=""></a> -->
    </h6>
    <h6 class="title">Your tasks for today -</h6>
    <div class="progressss">
        <span class="progress__count">0/X</span>
        <input class="progressss__reset" type="reset" value="Reset" title="Reset Checkboxes" tabindex="0" />


        <span class="progress__border"></span>
        <span class="progress__bar"></span>
    </div>
    <link rel="stylesheet" href="checklist.js" />

    <link rel="stylesheet" href="checklist.css" />
</header>

<body>

    <div class="container">
        <section class="checklist">
            <form method="POST" action="">
                <div>
                    <h2 class="checklist__title">To Deliver</h2>
                    <span class="checklist__title-border"></span>
                    <span class="checklist__percentage-border"></span>
                    <ul class="checklist-container">
                        <li class="checklist-item">
                            <input id="" type="checkbox" name='chk1[]' value="Images Optimized" /><label for=""
                                class="checkbox"></label><span class="checklist-item__title">Images Optimized</span>
                            <button class="checklist-item__expand" aria-label="Toggle Info"
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
                    <!-- <input class="progressss__reset" name="submit1" value="Submit" /> -->

                    <script>
                    const checkboxValues =
                        JSON.parse(localStorage.getItem("checkboxValues")) || {},
                        buttons = Array.from(
                            document.querySelectorAll(".checklist-item__expand")
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
                        reset = document.querySelector(".progressss__reset");

                    //         function loadIds() {
                    //             for (let a = 0; a < checkboxesLength; a += 1) {
                    //                 const b = (a) => a.replace(/[ ,.!?;:'-]/g, "");
                    //                 (checkboxes[a].id = `${b(
                    //     checkboxes[a].nextSibling.nextSibling.innerText
                    //   ).toLowerCase()}`),
                    //                 checkboxes[a].nextSibling.setAttribute(
                    //                     "for",
                    //                     `${b(
                    //         checkboxes[a].nextSibling.nextSibling.innerText
                    //       ).toLowerCase()}`
                    //                 );
                    //             }
                    //         }

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
                        this.classList.add("progressss__reset--pressed"),
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
                                    this.classList.remove("progressss__reset--pressed");
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
                <!-- <input class="progressss__reset" name="submit" type="reset" value="Submit" title="Reset Checkboxes"
                    tabindex="0" required /> -->
                <button name="submit" class="button1">Submit</button>

                <!-- <input type="submit" name="submit" value="submit" required> -->
            </form>
        </section>
        <section class="checklist">
            <form method="POST" action="">
                <h2 class="checklist__title">To Receive</h2>
                <span class="checklist__title-border"></span>
                <span class="checklist__percentage-border"></span>
                <ul class="checklist-container">
                    <li class="checklist-item">
                        <input id="" type="checkbox" name="chk2[]" value="Page-Specific Keywords Set" /><label for=""
                            class="checkbox"></label><span class="checklist-item__title">Page-Specific Keywords
                            Set</span>
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
                    resett = document.querySelector(".progressss__reset");

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
                    this.classList.add("progressss__reset--pressed"),
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
                                this.classList.remove("progressss__reset--pressed");
                            },
                            !1
                        ),
                        "serviceWorker" in navigator &&
                        navigator.serviceWorker.register("/sw.js", {
                            scope: "/",
                        });
                };
                </script>
                <!-- <input type="submit" name="submit2" value="submit" required> -->
                <button name="submit2" class="button1">Submit</button>

            </form>
        </section>
    </div>

</body>

</html>