<!--
MODALS
-->
        </div>
    </div>
    <div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Settings</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <h5>Weights:</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="/resources/php/weight_add.php" method="post">
                                <div class="row pt-2 pb-2">
                                    <div class="col-md-12">
                                        <?php
                                            $query = "SELECT * FROM weights";
                                            $stmt = $connectPDO->prepare($query);
                                            $stmt->execute();
                                            $weights = $stmt->fetch(PDO::FETCH_ASSOC);
                                            foreach ($weights as $key=>$value) {
                                                if ($key == "id") {
                                                    
                                                }
                                                else {
                                                echo "<div class='form-group'>";
                                                echo "<p for='$key'>$key</p>";
                                                echo "<input required id='$key' class='form-control ml-3' style='max-width: 200px;' type='number' name='$key' onclick='weightTotal();' value='$value'>";
                                                echo "</div>";}
                                            }
                                        ?>                                
                     
                                    </div>
                                    <button type="submit" class="btn btn-primary ml-auto mr-4 mb-2">Update Weights</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-secondary mr-auto" href="scouting_fun.php">Unimportant</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="map" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Settings</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <img id="field_map" src="/resources/images/field_br_labeled.jpg" height=100%; width=100%>                 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-2 text-center">
                        <a class="btn btn-outline-secondary" onclick="changeMap();">Switch Orientation</a>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-secondary mr-auto" href="scouting_fun.php">Unimportant</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <script src="/resources/bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="/resources/bootstrap/js/popper.min.js"></script>
    <script src="/resources/bootstrap/js/bootstrap.min.js"></script>
    <script src="/resources/jQuery/jquery-1.12.4.js"></script>
    <script src="/resources/jQuery/jquery.dataTables.min.js"></script>
    <script src="/resources/bootstrap/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#analyze').DataTable();
        } );
        var switchStatus = true;
        function oneToTwelve() {
            document.getElementById('1').style.top="70%";
            document.getElementById('1').style.left="77%";
            document.getElementById('12').style.top="12%";
            document.getElementById('12').style.left="17%";
        }
        function twelveToOne() {
            document.getElementById('12').style.top="70%";
            document.getElementById('12').style.left="77%";
            document.getElementById('1').style.top="12%";
            document.getElementById('1').style.left="17%";
        }
        function twoToEleven() {
            document.getElementById('2').style.top="40%";
            document.getElementById('2').style.left="77%";
            document.getElementById('11').style.top="40%";
            document.getElementById('11').style.left="17%";
        }
        function elevenToTwo() {
            document.getElementById('11').style.top="40%";
            document.getElementById('11').style.left="77%";
            document.getElementById('2').style.top="40%";
            document.getElementById('2').style.left="17%";
        }
        function threeToTen() {
            document.getElementById('3').style.top="12%";
            document.getElementById('3').style.left="77%";
            document.getElementById('10').style.top="70%";
            document.getElementById('10').style.left="17%";
        }
        function tenToThree() {
            document.getElementById('10').style.top="12%";
            document.getElementById('10').style.left="77%";
            document.getElementById('3').style.top="70%";
            document.getElementById('3').style.left="17%";
        }
        function fourToNine() {
            document.getElementById('4').style.top="70%";
            document.getElementById('4').style.left="57%";
            document.getElementById('9').style.top="12%";
            document.getElementById('9').style.left="37%";
        }
        function nineToFour() {
            document.getElementById('9').style.top="70%";
            document.getElementById('9').style.left="57%";
            document.getElementById('4').style.top="12%";
            document.getElementById('4').style.left="37%";
        }
        function fiveToEight() {
            document.getElementById('5').style.top="40%";
            document.getElementById('5').style.left="57%";
            document.getElementById('8').style.top="40%";
            document.getElementById('8').style.left="37%";
        }
        function eightToFive() {
            document.getElementById('8').style.top="40%";
            document.getElementById('8').style.left="57%";
            document.getElementById('5').style.top="40%";
            document.getElementById('5').style.left="37%";
        }
        function sixToSeven() {
            document.getElementById('6').style.top="12%";
            document.getElementById('6').style.left="57%";
            document.getElementById('7').style.top="70%";
            document.getElementById('7').style.left="37%";
        }
        function sevenToSix() {
            document.getElementById('7').style.top="12%";
            document.getElementById('7').style.left="57%";
            document.getElementById('6').style.top="70%";
            document.getElementById('6').style.left="37%";
        }
        function change() {
            if (switchStatus) {
                document.getElementById('field').style.backgroundImage="url('/resources/images/field_rb.jpg')";
                oneToTwelve();
                twoToEleven();
                threeToTen();
                fourToNine();
                fiveToEight();
                sixToSeven();
                switchStatus = false;
            }
            else if (!switchStatus) {
                document.getElementById('field').style.backgroundImage="url('/resources/images/field_br.jpg')";
                twelveToOne();
                elevenToTwo();
                tenToThree();
                nineToFour();
                eightToFive();
                sevenToSix();
                switchStatus = true;
            }
        }
        function changeMap() {
            if (switchStatus) {
                document.getElementById("field_map").src="/resources/images/field_rb_labeled.jpg";
                switchStatus = false;
            }
            else if (!switchStatus) {
                document.getElementById("field_map").src="/resources/images/field_br_labeled.jpg";
                switchStatus = true;
            }
        }
        function addLoc($loc) {
            var value = document.getElementById('instructions').value;
            var add = $loc;
            document.getElementById('instructions').value = value+add;
        }
        function weightTotal() {
            
        }
    </script>
</body>
</html>