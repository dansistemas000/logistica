<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Chart</title>
    </head>
    <body>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				{!! $chart->container() !!}

    				{!! $chart->script() !!}
    			</div>
    			<div class="col-md-12">
    				{!! $chart2->container() !!}

    				{!! $chart2->script() !!}
    			</div>
                @if($level == 1)
                    <div class="col-md-12">
                        {!! $chart3->container() !!}

                        {!! $chart3->script() !!}
                    </div>
                @endif
    		</div>
    	</div>
    </body>
    <footer>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset=utf-8></script>
    </footer>
</html>