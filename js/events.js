$(document).ready(function() {
 tab = $("#inptTab").val();

 $tabs = $("#tabs_events").tabs({
  select: function(event, ui) {
   $(".thumb").remove();
   page = 1;
  },
  load: function(event, ui) {
   $(".event").colorbox({rel:'event'});
  },
  add: function(event, ui) {
   var name = "#" + ui.panel.id;
   if (ui.tab.firstChild.textContent == tab) {
    $tabs.tabs('select', '#' + ui.panel.id);
   }
  }
  });

 page = 1;
 add_monitors();
 setup_is();


 // PAGE STUFF //
 $("#btnSubmit").button();
 $("#btnDelete").button();
 $("#btnDelete").click(function(){
  var answer = confirm("Are you sure you want to delete these events?");
  if (answer){
   $("#tabs_events input:checked").each(function (i){
    var eid = $(this).attr("value");
    $.post("skins/new/includes/deleteEvent.php?eid="+eid);
   });
  }
 });
 // PAGE STUFF //
 

 //FUNCTIONS//
 function add_monitors(){
  $.post("skins/new/includes/getMonitors.php", function(data){
   var monitors = data.split(","); // Put monitors into array
   monitors.pop(); // Pop off last monitor (it is blank)
   var x = monitors.length; // Number of monitors
   for (var i=0;i<x;i++){
    var monitor = monitors[i];
    $tabs.tabs('add', "skins/new/includes/getEvents.php?MonitorName="+monitor, monitor);
   }
  });
 };

 function setup_is(){
  $(window).scroll(function(){
   if ($(window).scrollTop() == ($(document).height() - $(window).height())){
    FetchMore();
   }
  });
 }

 function display_spinner(){
  var spinner = '<img class="spinner" src="skins/new/graphics/spinner.gif" alt="Loading..." />';
  var ui_tab = $("li.ui-state-active a").attr("href");
  $(ui_tab).append(spinner);
 };

 function hide_spinner(){
  $(".spinner").remove();
 };

 function FetchMore(){
  display_spinner();
  var MonitorName = $('li.ui-state-active a span').text(); // Currently selected monitor
  $.post("skins/new/includes/getEvents.php?MonitorName="+MonitorName+"&page="+page, function(data){ // Get more events
   if (data != "") {
    var ui_tab = $("li.ui-state-active a").attr("href");
    $(".ui-tabs-panel .clearfix").remove(); // Remove the clearfix div so events display correctly
    $(ui_tab).append(data); // Append next page of events
   }
   $(".event").colorbox({rel:'event'});
  });
  page = page + 1;
  hide_spinner();
 }
 //FUNCTIONS//
});
