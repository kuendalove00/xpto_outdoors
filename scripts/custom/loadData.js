$("button").click(function(){
  $.post("demo_test_post.asp",
  {
    name: "Donald Duck",
    city: "Duckburg"
  },
  function(data, status){
    alert("Data: " + data + "\nStatus: " + status);
  });
});


(function () {
    var previous;

    $("select").on('focus', function () {
        // Store the current value on focus and on change
        previous = this.value;
    }).change(function() {
        // Do something with the previous value after the change
        alert(previous);

        // Make sure the previous value is updated
        previous = this.value;
    });
})();

$('select').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    ....
});

  <select name="alldentists" id="alldentists"><option>One</option>
    <option>Two</option>
        <option>Three</option>
    </select>
    <input type="text" id="comment_post_ID"/> 

jQuery(document).ready(function() {
      var comment_post_ID=jQuery("#alldentists").val();
      jQuery("#alldentists").on('change', function(e) {
        comment_post_ID = jQuery("#alldentists").val();
        jQuery("#comment_post_ID").val(comment_post_ID);  
      });
      jQuery("#comment_post_ID").val(comment_post_ID);
});

$.ajax({
    type: 'POST',
    // make sure you respect the same origin policy with this url:
    // http://en.wikipedia.org/wiki/Same_origin_policy
    url: 'http://nakolesah.ru/',
    data: { 
        'foo': 'bar', 
        'ca$libri': 'no$libri' // <-- the $ sign in the parameter name seems unusual, I would avoid it
    },
    success: function(msg){
        alert('wow' + msg);
    }
});