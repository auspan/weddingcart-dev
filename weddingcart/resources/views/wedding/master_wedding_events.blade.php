@extends('app')

@section('content')

<meta name="_token" content="{{ csrf_token() }}">
    <section id="content" class="secstyle">
      <div class="content-wrap">
        <div class="container clearfix">
          <div class="heading-block center">
            <h2>Wedding Events</h2>
          </div>
          <div class="events small-thumbs">
          <?php $count = 1 ?>
          <div id="events">
          @foreach($MasterEvent as $masterEvents)
			      <div class="entry clearfix">
			        <div class="col-md-2">
			        	<input type="hidden" id="weddingEventId{{$count}}" name="weddingEventId{{$count}}" value="{{$masterEvents['id']}}">
			            <img src="{{$masterEvents['event_image']}}" alt="Event_Image" id="eventImage{{$count}}" name="eventImage{{$count}}">
			            <input type="hidden" class="hide-content" value="{{$masterEvents['event_image']}}" id="eventImgName{{ $count }}" name="eventImgName{{ $count }}">
			            <div class="clear"></div>
			            <div class="entry-title">
			            <input required aria-required="true" class="required form-control" id="eventName{{$count}}" name="eventName{{$count}}" placeholder="Event Name" type="text" value="{{$masterEvents['event_name']}}">
			          </div>
			        </div>
			        <div class="col-md-9">
			          <div class="quick-contact-widget clearfix">
			            
			            <textarea aria-required="true" class="required form-control short-textarea" id="venue{{$count}}" name="venue{{$count}}" rows="2" cols="30" placeholder="Venue"></textarea>

			            <div id="weddate" class="input-group date">
			                <input  name="wedding_date{{$count}}" type="text" id="wedding_date{{$count}}" class="form-control" placeholder="DD/MM/YYYY">
			                <div class="input-group-addon">
			                    <span class="glyphicon glyphicon-th"></span>
			                </div>
            			</div>
        				<input type="hidden" name="wed_date" class="form-control" value="wdt">

			          </div>
			        </div>
			        <div class="col-md-1 col_last tright">
			            <a href="javascript::void(0)" id="btn-addevent-{{$count}}" class="btn-addtoevent"><i class="icon-plus icon-color-blue"></i></a>
			          </div>
			        </div>
      <?php $count++ ?>
      @endforeach
      </div>
          </div>
         </div>
       </div>
      </section>

      @stop