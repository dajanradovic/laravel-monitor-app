@extends('layouts.app')

@section('content')


<?php $area= old('area'); ?>
<?php $county= old('county'); ?>

<style>

body {

    opacity: 0.9;
}

</style>

<div class="container ">
<div class="row">
<div class="col-md-12">
<nav aria-label="breadcrumb " style="margin-left: -15px;" >
  <ol class="breadcrumb bg-dark text-warning pull-left" style="margin-left: 0px;">
    <li class="breadcrumb-item active text-warning" aria-current="page">Dashboard</li>
	 <li class="breadcrumb-item text-warning " aria-current="page">Add new task</li>
  </ol>
</nav>
@if (session()->has('success'))
<div class="alert alert-success" role="alert">
  New task successfully added!
</div>
@endif
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark
 ">
                <div class="card-header text-white">{{ __('Open new task') }}</div>

                <div class="card-body bg-white">
                    <form method="POST" action="{{url('tasks')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Complainer Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Complainer Surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="name" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Complainer phone-number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="name" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Complainer E-Mail description') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Complainer Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="name" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="town" class="col-md-4 col-form-label text-md-right">{{ __('Complainer Town') }}</label>

                            <div class="col-md-6">
                                <input id="town" type="text" class="form-control @error('town') is-invalid @enderror" name="town" value="{{ old('town') }}" required autocomplete="name" autofocus>

                                @error('town')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                       
                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Service problem area') }}</label>
                            <div class="col-md-6">
                          
                            <select  selected class="form-control @error('area') is-invalid @enderror" name="area" id="area">
                                  <option value="" disabled selected hidden>Choose service problem area</option>
                                  <option <?php echo $area == "House phone" ? "selected" : "";?>>House phone</option>
                                  <option <?php echo $area == "Mobile phone" ? "selected" : "";?>>Mobile phone</option>

                                  <option <?php echo $area == "Internet" ? "selected" : "";?>>Internet</option>
                                  <option <?php echo $area == "TV" ? "selected" : "";?>>TV</option>
                            </select>
                            @error('area')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="county" class="col-md-4 col-form-label text-md-right">{{ __('County') }}</label>
                            <div class="col-md-6">
                          
                            <select  value="{{ old('county') }}"class="form-control @error('county') is-invalid @enderror" name="county" id="county">
                                  <option value="" disabled selected hidden>Choose your area</option>
                                  <option <?php echo $county == "Grad Zagreb" ? "selected" : "";?>>Grad Zagreb</option>
                                  <option <?php echo $county == "Zagrebačka županija" ? "selected" : "";?>>Zagrebačka županija</option>
                                  <option <?php echo $county == "Karlovačka županija" ? "selected" : "";?>>Karlovačka županija</option>
                                  <option <?php echo $county == "Ličko-senjska županija" ? "selected" : "";?>>Ličko-senjska županija</option>
                                  <option <?php echo $county == "Istarska županija" ? "selected" : "";?>>Istarska županija</option>
                                  <option <?php echo $county == "Primorsko-goranska županija" ? "selected" : "";?>>Primorsko-goranska županija</option>
                                  <option <?php echo $county == "Karlovačka županija" ? "selected" : "";?>>Karlovačka županija</option>
                                  <option <?php echo $county == "Krapinsko-zagorska županija" ? "selected" : "";?>>Krapinsko-zagorska županija</option>
                                  <option <?php echo $county == "Varaždinska županija" ? "selected" : "";?>>Varaždinska županija</option>
                                  <option <?php echo $county == "Zadarska županija" ? "selected" : "";?>>Zadarska županija</option>
                                  <option <?php echo $county == "Koprivničko-križevačka županija" ? "selected" : "";?>>Koprivničko-križevačka županija</option>
                                  <option <?php echo $county == "Splitsko-dalmatinska županija" ? "selected" : "";?>>Splitsko-dalmatinska županija</option>
                                  <option <?php echo $county == "Dubrovačko-neretvanska županija" ? "selected" : "";?>>Dubrovačko-neretvanska županija</option>
                                  <option <?php echo $county == "Šibensko-kninska županija" ? "selected" : "";?>>Šibensko-kninska županija</option>
                                  <option <?php echo $county == "Bjelovarsko-bilogorska županija" ? "selected" : "";?>>Bjelovarsko-bilogorska županija</option>
                                  <option <?php echo $county == "Brodsko-posavska županija" ? "selected" : "";?>>Brodsko-posavska županija</option>
                                  <option <?php echo $county == "Osječko-baranjska županija" ? "selected" : "";?>>Osječko-baranjska županija</option>
                                  <option <?php echo $county == "Požeško-slavonska županija" ? "selected" : "";?>>Požeško-slavonska žušanija</option>
                                  <option <?php echo $county == "Sisačko-moslavačka županija" ? "selected" : "";?>>Sisačko-moslavačka županija</option>
                                  <option <?php echo $county == "Vukovarsko-srijemska županija" ? "selected" : "";?>>Vukovarsko-srijemska županija županija</option>
                                  <option <?php echo $county == "Virovitičko-podravska županija" ? "selected" : "";?>>Virovitičko-podravksa županija</option>
                                  
                            </select>
                            @error('county')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Problem description') }}</label>

                            <div class="col-md-6">
                                <textarea rows="6"id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="name" autofocus>{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        
                        
                         <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                              
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.chatinvitationscript')
@endsection
