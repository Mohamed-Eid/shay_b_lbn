<div id="posts">
    @foreach($videos AS $video)
        <p>{{ $video->name }}</p>
        <br>
    @endforeach
    {{ $videos }}
</div>

<button class="see-more" data-page="2" data-link="{{ route('test') }}?page=" data-div="#posts">See more</button> 
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script>
$(function() {
  var $posts = $("#posts");
  var $ul = $("ul.pagination");
  $ul.hide(); // Prevent the default Laravel paginator from showing, but we need the links...

  $(".see-more").click(function() {

      $.get($ul.find("a[rel='next']").attr("href"), function(response) {
          console.log($(response).find("#posts").html());
           $posts.append(
               $(response).find("#posts").html()
           );
      });
  });
});
</script>