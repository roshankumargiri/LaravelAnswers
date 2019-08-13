@extends('template')
@section('content')
<div class="container" id="app">



    <div class="">
        <div class="col-md-6 col-md-offset-3" v-if="step==1">
            <h1>Enter an address to ger weather</h1>
            <hr>
            <form>
                <input type="text" name="location" style="margin:20px 0;" class="form-control"
                    placeholder="Enter zip code or address">
                <button class="btn btn-primary" v-on:click.prevent="getWeather" style="width:100%;">Get weather</button>
            </form>
        </div>
        <br />


        <div class="col-md-6 col-md-offset-3" v-if="step==2">
            <h1>Formatted Address</h1>
            <hr>
            <p>
                Weather summary
            </p>
            <ul>
                <li>Current Temp: Temp</li>
                <li>Feels Like: Temp</li>
                <li>Wind Speed:test mph</li>
            </ul>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    let app = new Vue({
        el:'#app',
        data: {
            'step': 1
        },
        methods:{
            getWeather:function(){
                this.step=2;
            }
        }

    });

</script>
@endsection
