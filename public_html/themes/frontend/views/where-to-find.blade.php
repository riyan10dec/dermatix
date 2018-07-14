<?php
Theme::breadcrumb()
        ->add('Home', URL::to('/'))
        ->add('Where to Find Us', URL::to('where-to-find'));
?>
<section id="catch-us" class="container">
	<div class="row">
	  <a target="_blank" href="{{ URL::to('scarpersonality') }}">
	    <img src="{{ assets_path('images/where-to-find.jpg') }}" alt="">
	  </a>
	</div>
    <header class="page-header">
        <h1 class="title">Where to Find Us</h1>
    </header>
    <div class="row imgToko">
        <?php for ($i = 1; $i <= 3; $i++): ?>
            <div class="col-sm-4" @if($i == 1) style="padding-right:0;" @else style="padding:0;" @endif>
                <img src="{{ uploads_path('store/list-store-'.$i.'.jpg') }}" class="imgStore img-100" alt="Images Store">
            </div>
        <?php endfor; ?>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="wtf animated fadeInDown" data-appear-animation="fadeInDown">
                <div class="wtf-form">
                    {{ Form::select('city', $cities, Input::get('city'), ['class'=>'form-control city without-styles', 'data-plugin-selectTwo']) }}
                    {{--<a href="page-where-to-find.php">--}}
                        {{--<input type="submit" class="btn btn-primary btn-sm btn-PWTF">--}}
                    {{--</a>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="content blog col-sm-12 col-md-12">
        <div class="row">
            <div class="table-responsive">
                @if(Input::get('city'))
                    <table class="table table-bordered">
                        <thead class="thead-color">
                        <tr class="text-upper">
                            <th>no</th>
                            <th>store name</th>
                            <th>address</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($results) > 0)
                            <?php
                            $page = Input::get('city') ? Input::get('page') : 1;

                            if($page > 1){
                                $i = $results->getPerPage() * ($page - 1) + 1;
                            } else {
                                $i = 1;
                            }


                            ?>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $result->store_name }}</td>
                                    <td>{{ $result->address }}</td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" align="center">Not Found</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    {{ $results->appends(Request::except('page'))->links() }}
                @endif
            </div>
        </div>
    </div><!-- .content -->
</section>

<script>
    $(document).ready(function(){
        var url = "{{ URL::to('where-to-find') }}";
        $('.city').on('change', function () {
            window.location = url + '?city=' + $(this).val();
        });
    });
</script>