<?php

// Static JSON2HTML Web Page Generator for the Daily Racing Form Historical Archive

// @copyright Copyright 2017 Eric C. Weig 

// This program requires 3 command line arguments: decade, year and article id

//set some paths to important things
$catalog="/home/ukscrcne/public_html/catalog";
$tocs="/home/ukscrcne/public_html/catalog/tocs";

//set variables for input arguments
$drfdecade = "$argv[1]";
$drfyear = "$argv[2]";
$drfid = "$argv[3]";

//read in the JSON file for a drf article
$content=file_get_contents("$catalog/$drfdecade/$drfyear/$drfid.json", true);

//decode the JSON string
$json_metadata=json_decode($content, true);

//set variables from JSON values
$issueid = $json_metadata["57_t"];
$text = $json_metadata["59_t"];
$articleid = $json_metadata["43_t"];
$pageno = $json_metadata["68_t"];
$articletype = $json_metadata["52_t"];
$issuedate = $json_metadata["54_t"];
$articletitle = $json_metadata["50_t"];
$articleyear = $json_metadata["63_t"];
$articlepdf = $json_metadata["60_t"];

//clean up the full-text field a bit just in case
$search = array("\n", "\"");
$replace = array(" ", " ");
$nolinetxt = str_replace($search,$replace,$text);

//delete old HTML file if one exists
unlink("$catalog/$drfdecade/$drfyear/$drfid.html");

//variable to write HTML file given the same filename as the json drf article file
$write = fopen("$catalog/$drfdecade/$drfyear/$drfid.html", "w");

//read in contents of HTML table of contents for article and store as a variable
$toc = file_get_contents("$tocs/$drfdecade/$issueid.html", true);

//generate html file putting JSON values in as needed
$html = <<<HTML

<!DOCTYPE html>
<html lang="en" id="$articleid">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="HandheldFriendly" content="True">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="description" content="Daily Racing Form Historical Online Archive">
<meta name="keywords" content="horses, horse racing, horse racing tracks">
<meta name="pubdate" content="$issuedate">
<meta name="type" content="$articletype">
<title>$articletitle  $articletype -  Page $pageno, Daily Racing Form, $json_metadata->62_t</title>
<link href="../../css/drf.css" media="all" rel="stylesheet">
<link href="../../css/drf_extra.css" media="all" rel="stylesheet">
<script src="../../scripts/jquery-1.12.0.min.js"></script>
<script src="../../scripts/jquery-migrate-1.2.1.min.js"></script>
<style>a#$articleid {        background-color: #FFF8C6;}</style>
</head>
<body>
   <div id="search-navbar" class="navbar navbar-default navbar-static-top">
      <div class="container" style="padding-top:10px">
         <div>
            <div>
               <div>
                  <div>
                      <iframe src="../../includes/header.html" height="28" name="header" scrolling="no"></iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div id="main-container" class="container">
      <div class="row">
         <div class="col-md-12">
            <div id="main-flashes">
               <div class="flash_messages">
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div id="content" class="col-md-9 col-sm-8 show-document">
            <div>
               <div class="page_links">
                  <img src="../../images/calendar_icon.gif" alt="calendar icon">
                  <a href="../../cal/$articleyear.html">calendar view</a>
               </div>
               <div class="pull-right search-widgets">
                  <a class="btn" href="../../" id="startOverLink">start over&nbsp;&nbsp;<img src="../../images/searchy_icon.png" alt="search icon"/></a>
               </div>
            </div>
            <div id="document" class="document">
               <div id="doc_$json_metadata->43_t" typeof="schema:NewsArticle">
               <h1 property="schema:name">$articletitle $articletype -  Page $pageno, <span class="drftitle">Daily Racing Form</span>, $issuedate</h1>
               <h5 thing="schema:category">$articletype</h5>
               <div>
                  <div class="panel panel-default show-tools">
                     <div class="panel-heading">
                     <img src="../../images/pdfjs.png" alt="PDFjs logo">
                     <a href="https://drf.uky.edu//scripts/ViewerJS/#../../catalog/$drfdecade/$issueid/$articlepdf" target="_blank">Zoom (Full Screen)</a>
                     </div>
                     <p>
                        <iframe src="https://drf.uky.edu//scripts/ViewerJS/#../../catalog/$drfdecade/$issueid/$articlepdf" height="1000" name="viewer" id="viewer"></iframe>
                     <br/>
                        <section id="raw">
                           <article>
                              <details>
                                 <summary>view raw text</summary>
                                    <p>$nolinetxt</p>
                              </details>
                        </section>
                     <br/>
                     <div id="persistent">
                     <p>Persistent Link: <a href="https://drfarchive.org/catalog/$drfdecade/$articleid" target="_blank">https://drfarchive.org/catalog/$json_metadata- /$articleid</a>
                     <br/>Local Identifier: $articled
                     <br/>Library of Congress Record: <a href="https://lccn.loc.gov/unk82075800" alt="Library of Congress Record">https://lccn.loc.gov/unk82075800</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="sidebar" class="col-md-3 col-sm-4">
         <div class="panel panel-default show-tools">
            <div class="panel-heading">Table of Contents</div>
               <div class="panel-body">
                  <div id="tocdiv">
                     <table id="toctable">
                        <tbody>
                           <tr>
                              <td>
$toc
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         <div class="panel panel-default show-tools">
            <div class="panel-heading">Use Information</div>
               <div class="panel-body">
                  <p></p>
                  <iframe src="../../includes/use.html" height="200" name="use"></iframe>
                  <p></p>
               </div>
            </div>
            <p>
               <span style="float:right;"><img width="115px" src="../../images/powered-by.png" /></span>
            </p>
         </div>
      </div>
   </div>
   <iframe src="../../includes/footer.html" height="300" name="footer"></iframe>
   <p style="text-align:center;font-size:smaller;"><span class="preservation"><a href="https://archive.org/download/$issueid/$issueid.pdf"><img width="35px" height="32px" src="../../images/Internet_Archive_logo_item.png" /><br/>download this issue</a></span></p>
   <br/>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-78300266-1', 'auto');
  ga('send', 'pageview');

</script>

</body>

</html>

HTML;

//write html output back to the html file
fwrite($write, $html);

//close write function
fclose($write);
?>



