


<div class="dropdown">
    <input id="txt1" name = 'tag' size="50" onfocusin="background_blur()" onfocusout="setTimeout(background_non_blur, 200)" onkeyup="showHint(this.value)" class="dropdown-for-search form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <!-- <input id="txt1" name = 'tag' onkeyup="showHint(this.value)" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
    <div class="dropdown-content-for-search" id='searchSug'>
      <div id="sugestion_area"></div>
    </div>
  </div>
  <input type="submit" name="submit"  class="btn btn-outline-success my-2 my-sm-0" name="submit" value='Search'>
    <!-- <button class="btn btn-outline-success my-2 my-sm-0" name="submit" type="submit">Searchabcd</button> -->


<p><span id="txtHint"></span></p>
<p id="demo"></p>

<script>
function showHint(str) {

  var xhttp;
  if (str.length == 0) { 
    document.getElementById("sugestion_area").innerHTML = "";
    document.getElementById("searchSug").classList.remove("padding-for-search");
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var respns_txt = this.responseText;
      document.getElementById("sugestion_area").innerHTML = respns_txt;
      if(respns_txt==""){
        document.getElementById("searchSug").classList.remove("padding-for-search");
      }
      else{
        document.getElementById("searchSug").classList.add("padding-for-search");
      }
    }
  };
  xhttp.open("GET", "search.php?q="+str, true);
  xhttp.send();   
}
function select(element){
    document.getElementById('txt1').value =  element.textContent;
    document.getElementById("sugestion_area").innerHTML = "";
    document.getElementById("searchSug").classList.remove("padding-for-search");
}

function background_blur(){
  document.getElementById("for_background_blur").classList.add("background-blur");
}

function background_non_blur(){
  document.getElementById("searchSug").classList.remove("padding-for-search");
  document.getElementById("for_background_blur").classList.remove("background-blur");
  document.getElementById("sugestion_area").innerHTML = "";
  
}
</script>
