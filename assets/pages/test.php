<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Php | Quiz</title>
<!-- ================== BEGIN core-css ================== -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
<link rel="stylesheet" href="../css/quizstyle.css">
<!-- ================== END core-css ================== -->
</head>
<body>

<a href="../../index.php" class="btn bg-success bg-opacity-50 text-white fw-bold ms-3 mt-2"><i class="bi bi-arrow-left"></i> Back</a>
<div class="stepper">
    <div class="stepper-item completed">
      <div class="step-counter"><i class="bi bi-card-list"></i></div>
      <div class="step-name">RULES</div>
    </div>
    <div class="stepper-item" id="QuizStep">
      <div class="step-counter"><i class="bi bi-puzzle"></i></div>
      <div class="step-name">QUIZ</div>
    </div>
    <div class="stepper-item" id="ResultStep">
      <div class="step-counter"><i class="bi bi-check2-circle"></i></div>
      <div class="step-name">RESULT</div>
    </div>
  </div>
  <!--------------------------------------quizContent----------------------->
<div class="contentContainer">
    <div class="quizForm">
        <div id="rulesId">
            <div>
                <h3 class="fontWeight">Rules</h3><hr>
                <ol class="ruleslist">
                    <li><i class="bi bi-clipboard-check"></i>one question is right </li>
                    <li><i class="bi bi-clipboard-check"></i>if you didn't select in choice </li>
                    <li><i class="bi bi-clipboard-check"></i>you cant go back to the last question after you submit</li>
                    <li><i class="bi bi-clipboard-check"></i>you will get the result at the end</li>
                </ol>
            </div>
            <div class="mt-5">
                    <button class="btn bg-success text-white px-3" id="startId" onclick="">Start</button>
            </div>
        </div>
        <!-- quizForm -->

        <div id="quizId" class="hide">
            <div id="TimerId">
                <span>&#9203; 00</span><span>:</span><span id="timeCounter">10</span>
            </div>
            <div id="progBack" class="my-2">
                <div id="progFront">
                </div>
            </div>
            <div>
                <p>Question <span id="questionNum"></span></p>
                <p class="fontWeight" id="questionId"></p><hr>
            </div>
            <div id="formId">
                <table>
                    <tr>
                        <td><input class="form-check-input" type="radio" name="options" id="Answer_1" value="1"></td>
                        <td><label for="Answer_1"  id="option1"></label></td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="radio" name="options" id="Answer_2" value="2"></td>
                        <td><label for="Answer_2"  id="option2"></label></td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="radio" name="options" id="Answer_3" value="3"></td>
                        <td><label for="Answer_3"  id="option3"></label></td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="radio" name="options" id="Answer_4" value="4"></td>
                        <td><label for="Answer_4"  id="option4"></label></td>
                    </tr>
                    </table> <hr>
                <div class="mt-5 buttons">
                    <button class="btn bg-success text-white px-3" id="submitId" style="visibility:hidden;">Submit</button>
                   <form action=""><button class="btn bg-primary text-white px-4">Exit</button></form> 
                </div>
            </div>
        </div>
        <!-- ResultForm -->
        <div class="hide" id="resultId">
            <div>
                <h3 class="fontWeight">Result</h3><hr>
                <div>
                    <div id="level"></div>
                    <div class="fontWeight">True Answers <span id="tA">12</span></div>
                    <div class="fontWeight">False Answers <span id="fA">1</span></div>
                    <div class="fontWeight">Score <span id="score">1</span></div>
                </div>
                <div class="mt-5 buttons">
                   <form action=""><button class="btn bg-primary text-white px-4">Reset</button></form> 
                </div>
            </div>
        </div>

    </div>
</div>


<footer>
    
</footer>











    
    <!--==================================== scripts ======================================-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
</body>
</html>





