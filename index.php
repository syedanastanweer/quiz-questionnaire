<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attachment Style Quiz</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/el-messiri" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/open-sans" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .btn {
            background: #4c1a40;
            padding: 10px 70px;
            /* border: none; */
            border-radius: 0;
            color: white;
        }

        .btn:hover {
            background: #FFFFFF;
            border: 1px solid #4c1a40;
            color: #4c1a40;
        }

        .quiz-container {
            max-width: 100%;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); */
        }

        .progress-container {
            position: relative;
        }

        .progress {
            height: 10px;
            border: 2px solid #4c1a40;
            background-color: #4c1a40;
        }

        .progress-bar {
            background: #FFFFFF;
        }

        .progress-circle {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 3px solid #6f2447;
            background: #FFFFFF;
            color: #6f2447;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 0 0 2px #fff;
        }

        .hidden {
            display: none;
        }

        .fade-out {
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .fade-in {
            opacity: 1;
            transition: opacity 1s ease-in-out;
        }

        .result-heading {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .result-label {
            font-weight: bold;
        }

        .txt-left {
            text-align: left !important;
        }

        .question {
            font-family: 'Open Sans', sans-serif;
        }

        .fs-messiri {
            font-family: "El Messiri", Sans-serif;
        }

        .fs-24 {
            font-size: 24px;
        }

        .fs-26 {
            font-size: 26px;
        }
    </style>
</head>

<body>

    <div class="quiz-container text-center">
        <h1 class="mb-4 fs-messiri">The Attachment Style Quiz</h1>
        <div id="start-container">
            <button id="start-btn" class="btn">START NOW</button>
        </div>
        <div id="question-container" class="hidden">
            <p class="mb-4 fs-messiri fs-24">Take our free quiz to find out your attachment style!</p>
            <div class="progress-container">
                <div id="progressCircle" class="progress-circle">0%</div>
                <div class="progress mb-4">
                    <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;"></div>
                </div>
            </div>
            <p id="question-text" class="question">Loading...</p>
            <div>
                <button id="btn-true" class="btn btn-success me-2">TRUE</button>
                <button id="btn-false" class="btn btn-danger">FALSE</button>
            </div>
        </div>
        <div id="result-container" class="hidden fade-in">
            <h2 class="result-heading fs-messiri fs-26">Your Attachment Style Results</h2>
            <div class="mb-3 txt-left">
                <label id="secureLabel" class="result-label">Securely Attached</label>
                <div class="progress">
                    <div id="secureResult" class="progress-bar" role="progressbar" style="width: 0%;">0%</div>
                </div>
            </div>
            <div class="mb-3 txt-left">
                <label id="fearfulLabel" class="result-label">Fearful Avoidant</label>
                <div class="progress">
                    <div id="fearfulResult" class="progress-bar" role="progressbar" style="width: 0%;">0%</div>
                </div>
            </div>
            <div class="mb-3 txt-left">
                <label id="anxiousLabel" class="result-label">Anxious Preoccupied</label>
                <div class="progress">
                    <div id="anxiousResult" class="progress-bar" role="progressbar" style="width: 0%;">0%</div>
                </div>
            </div>
            <div class="mb-3 txt-left">
                <label id="dismissiveLabel" class="result-label">Dismissive Avoidant</label>
                <div class="progress">
                    <div id="dismissiveResult" class="progress-bar" role="progressbar" style="width: 0%;">0%</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const questions = [
            { text: "I can be very emotionally present with others (friends, family, partners, strangers), but it takes me a while to build trust and share vulnerable things about myself.", correct: true, style: "Securely Attached" },
            { text: "I often put other people in my life on a big pedestal. (Partner, friends, family)", correct: false, style: "Anxious Preoccupied" },
            { text: "I feel naturally comfortable and safe expressing my feelings and needs to loved ones.", correct: true, style: "Dismissive Avoidant" },
            { text: "I feel very upset when others infringe on my need for space or time alone.", correct: true, style: "Fearful Avoidant" },
            { text: "I am willing to work through challenges in a relationship before suddenly trying to leave the relationship itself. (If you're not in a relationship, think of how you would handle conflict in a partnership.)", correct: true, style: "Fearful Avoidant" },
            { text: "I tend to be out of touch with my emotions quite frequently.", correct: false, style: "Fearful Avoidant" },
            { text: "I am very attuned to others' needs and often put them before my own and resent it later.", correct: true, style: "Fearful Avoidant" },
            { text: "I constantly want to be emotionally closer to my partner. This can also apply to my close friendships or romantic interests.", correct: true, style: "Fearful Avoidant" },
            { text: "I am effective at compromising and communicating.", correct: false, style: "Fearful Avoidant" },
            { text: "It is very difficult for me to set boundaries unless I am angry. I can sometimes set excessive boundaries and push people away too dramatically out of anger.", correct: true, style: "Fearful Avoidant" },
            { text: "If I notice my partner showing any signs of coldness, I panic and want to get closer as quickly as possible. This often happens to me in friendships as well.", correct: false, style: "Fearful Avoidant" },
            { text: "It is not uncommon for me to experience inward emotional turbulence throughout the duration of my romantic relationship. This applies to close family members as well.", correct: true, style: "Fearful Avoidant" },
            { text: "I often feel very hot or very cold towards my partner or family members. I tend to operate in extremes in how I relate to others.", correct: false, style: "Fearful Avoidant" },
            { text: "I know that I am worthy of a healthy, happy relationship.", correct: false, style: "Fearful Avoidant" },
            { text: "When I feel hurt by a loved one, I often have a strong fight or flight response. I find myself wanting to push this person as far away as possible. (Friends, family, romantic relationship).", correct: true, style: "Fearful Avoidant" },
            { text: "I do not feel as though I need anything from my romantic partner or loved ones. It can be difficult to conceptualize how others would meet a lot of my needs.", correct: true, style: "Fearful Avoidant" },
            { text: "I do not enjoy being out of romantic relationships. I often fear being alone.", correct: false, style: "Fearful Avoidant" },
            { text: "If a loved one's behavior hurts me, I will express my feelings and try to understand what caused them to act that way.", correct: true, style: "Fearful Avoidant" },
            { text: "I hunger for closeness, but I fear the emotional difficulty of it at the same time (friends, family, romantic partners).", correct: false, style: "Fearful Avoidant" },
            { text: "I do not like making social plans with others in advance. I often fear being trapped by commitments with other people.", correct: true, style: "Fearful Avoidant" },
            { text: "I find that setting boundaries comes naturally to me.", correct: true, style: "Fearful Avoidant" },
            { text: "I focus much more on the relationships in my life than I do on myself.", correct: false, style: "Fearful Avoidant" },
            { text: "I often feel protective over my space, privacy and belongings.", correct: true, style: "Fearful Avoidant" },
            { text: "I generally feel invaded when my partner or loved ones demand too much physical affection.", correct: false, style: "Fearful Avoidant" },
            { text: "I would prefer to spend most of my free time with my partner if I were to be in a romantic relationship. It would be hard for me to want to do things separately.", correct: true, style: "Fearful Avoidant" },
            { text: "I feel that it is easy to be vulnerable with my romantic partner or loved ones.", correct: false, style: "Fearful Avoidant" },
            { text: "I find that my partner or loved ones usually emotionally recover from conflict before I do.", correct: true, style: "Fearful Avoidant" },
            { text: "I deeply fear being abandoned by my partner or love interests.", correct: false, style: "Fearful Avoidant" },
        ];

        let currentQuestionIndex = 0;
        let progressStarted = false;
        const totalQuestions = questions.length;
        const styleCount = {
            "Securely Attached": 0,
            "Fearful Avoidant": 0,
            "Anxious Preoccupied": 0,
            "Dismissive Avoidant": 0
        };

        const startBtn = document.getElementById("start-btn");
        const startContainer = document.getElementById("start-container");
        const questionText = document.getElementById("question-text");
        const progressBar = document.getElementById("progressBar");
        const progressCircle = document.getElementById("progressCircle");
        const questionContainer = document.getElementById("question-container");
        const resultContainer = document.getElementById("result-container");
        const secureResult = document.getElementById("secureResult");
        const fearfulResult = document.getElementById("fearfulResult");
        const anxiousResult = document.getElementById("anxiousResult");
        const dismissiveResult = document.getElementById("dismissiveResult");
        const secureLabel = document.getElementById("secureLabel");
        const fearfulLabel = document.getElementById("fearfulLabel");
        const anxiousLabel = document.getElementById("anxiousLabel");
        const dismissiveLabel = document.getElementById("dismissiveLabel");
        const trueBtn = document.getElementById("btn-true");
        const falseBtn = document.getElementById("btn-false");

        function updateQuestion() {
            questionText.textContent = `${currentQuestionIndex + 1}) ${questions[currentQuestionIndex].text}`;
            if (progressStarted) {
                const progress = (currentQuestionIndex / totalQuestions) * 100;
                progressBar.style.width = `${progress}%`;
                progressCircle.textContent = `${Math.round(progress)}%`;
            }
        }

        function handleAnswer(isTrue) {
            if (!progressStarted) {
                progressStarted = true;
                updateQuestion();
            }

            const currentQuestion = questions[currentQuestionIndex];
            if (currentQuestion.correct === isTrue) {
                styleCount[currentQuestion.style]++;
            }

            currentQuestionIndex++;
            if (currentQuestionIndex < totalQuestions) {
                updateQuestion();
            } else {
                completeQuiz();
            }
        }

        function completeQuiz() {
            progressBar.style.width = "100%";
            progressCircle.textContent = "100%";
            questionContainer.classList.add("fade-out");
            setTimeout(() => {
                questionContainer.classList.add("hidden");
                displayResults();
            }, 1000);
        }

        function displayResults() {
            const totalAnswers = Object.values(styleCount).reduce((a, b) => a + b, 0);
            const stylePercentages = {
                "Securely Attached": (styleCount["Securely Attached"] / totalAnswers) * 100,
                "Fearful Avoidant": (styleCount["Fearful Avoidant"] / totalAnswers) * 100,
                "Anxious Preoccupied": (styleCount["Anxious Preoccupied"] / totalAnswers) * 100,
                "Dismissive Avoidant": (styleCount["Dismissive Avoidant"] / totalAnswers) * 100
            };

            secureLabel.textContent = `Securely Attached ${Math.round(stylePercentages["Securely Attached"])}%`;
            secureResult.style.width = `${stylePercentages["Securely Attached"]}%`;
            secureResult.textContent = `${Math.round(stylePercentages["Securely Attached"])}%`;

            fearfulLabel.textContent = `Fearful Avoidant ${Math.round(stylePercentages["Fearful Avoidant"])}%`;
            fearfulResult.style.width = `${stylePercentages["Fearful Avoidant"]}%`;
            fearfulResult.textContent = `${Math.round(stylePercentages["Fearful Avoidant"])}%`;

            anxiousLabel.textContent = `Anxious Preoccupied ${Math.round(stylePercentages["Anxious Preoccupied"])}%`;
            anxiousResult.style.width = `${stylePercentages["Anxious Preoccupied"]}%`;
            anxiousResult.textContent = `${Math.round(stylePercentages["Anxious Preoccupied"])}%`;

            dismissiveLabel.textContent = `Dismissive Avoidant ${Math.round(stylePercentages["Dismissive Avoidant"])}%`;
            dismissiveResult.style.width = `${stylePercentages["Dismissive Avoidant"]}%`;
            dismissiveResult.textContent = `${Math.round(stylePercentages["Dismissive Avoidant"])}%`;

            resultContainer.classList.add("fade-in");
            resultContainer.classList.remove("hidden");
        }

        startBtn.addEventListener("click", () => {
            startContainer.classList.add("hidden");
            questionContainer.classList.remove("hidden");
            initializeQuiz();
        });

        trueBtn.addEventListener("click", () => handleAnswer(true));
        falseBtn.addEventListener("click", () => handleAnswer(false));

        function initializeQuiz() {
            progressBar.style.width = "0%";
            progressCircle.textContent = "0%";
            currentQuestionIndex = 0;
            progressStarted = false;
            updateQuestion();
        }
    </script>

</body>

</html>