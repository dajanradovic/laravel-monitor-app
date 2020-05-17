@extends('layouts.app')

@section('content')


<?php $department= old('department'); ?>
<?php $workplace= old('workplace'); ?>

<div class="container">
<div class="row">
<div class="col-md-12">
<nav aria-label="breadcrumb " style="margin-left: -15px;" >
  <ol class="breadcrumb bg-dark text-warning pull-left" style="margin-left: 0px;">
    <li class="breadcrumb-item active text-warning" aria-current="page">Dashboard</li>
	 <li class="breadcrumb-item text-warning " aria-current="page">Register new user</li>
  </ol>
</nav>

</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register new user') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

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
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

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
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

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
                            <label for="town" class="col-md-4 col-form-label text-md-right">{{ __('Town') }}</label>

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
                            <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>
                            <div class="col-md-6">
                          
                            <select  selected class="form-control selectchange @error('department') is-invalid @enderror" name="department" id="department">
                                  <option value="" disabled selected hidden>Choose department</option>
                                  <option <?php echo $department == "Phone-agent" ? "selected" : "";?>>Phone-agent</option>
                                  <option <?php echo $department == "Technician on terrain" ? "selected" : "";?>>Technician on terrain</option>
                                  
                            </select>
                            @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>

                        <div class="form-group row" id="zupanija">
                            <label for="workplace" class="col-md-4 col-form-label text-md-right">{{ __('Work Place') }}</label>
                            <div class="col-md-6">
                          
                            <select  value="{{ old('workplace') }}"class="form-control @error('workplace') is-invalid @enderror" name="workplace" id="workplace">
                                  <option value="" disabled selected hidden>Choose your area</option>
                                  <option <?php echo $workplace == "Grad Zagreb" ? "selected" : "";?>>Grad Zagreb</option>
                                  <option <?php echo $workplace == "Zagrebačka županija" ? "selected" : "";?>>Zagrebačka županija</option>
                                  <option <?php echo $workplace == "Karlovačka županija" ? "selected" : "";?>>Karlovačka županija</option>
                                  <option <?php echo $workplace == "Ličko-senjska županija" ? "selected" : "";?>>Ličko-senjska županija</option>
                                  <option <?php echo $workplace == "Istarska županija" ? "selected" : "";?>>Istarska županija</option>
                                  <option <?php echo $workplace == "Primorsko-goranska županija" ? "selected" : "";?>>Primorsko-goranska županija</option>
                                  <option <?php echo $workplace == "Karlovačka županija" ? "selected" : "";?>>Karlovačka županija</option>
                                  <option <?php echo $workplace == "Krapinsko-zagorska županija" ? "selected" : "";?>>Krapinsko-zagorska županija</option>
                                  <option <?php echo $workplace == "Varaždinska županija" ? "selected" : "";?>>Varaždinska županija</option>
                                  <option <?php echo $workplace == "Zadarska županija" ? "selected" : "";?>>Zadarska županija</option>
                                  <option <?php echo $workplace == "Koprivničko-križevačka županija" ? "selected" : "";?>>Koprivničko-križevačka županija</option>
                                  <option <?php echo $workplace == "Splitsko-dalmatinska županija" ? "selected" : "";?>>Splitsko-dalmatinska županija</option>
                                  <option <?php echo $workplace == "Dubrovačko-neretvanska županija" ? "selected" : "";?>>Dubrovačko-neretvanska županija</option>
                                  <option <?php echo $workplace == "Šibensko-kninska županija" ? "selected" : "";?>>Šibensko-kninska županija</option>
                                  <option <?php echo $workplace == "Bjelovarsko-bilogorska županija" ? "selected" : "";?>>Bjelovarsko-bilogorska županija</option>
                                  <option <?php echo $workplace == "Brodsko-posavska županija" ? "selected" : "";?>>Brodsko-posavska županija</option>
                                  <option <?php echo $workplace == "Osječko-baranjska županija" ? "selected" : "";?>>Osječko-baranjska županija</option>
                                  <option <?php echo $workplace == "Požeško-slavonska županija" ? "selected" : "";?>>Požeško-slavonska žušanija</option>
                                  <option <?php echo $workplace == "Sisačko-moslavačka županija" ? "selected" : "";?>>Sisačko-moslavačka županija</option>
                                  <option <?php echo $workplace == "Vukovarsko-srijemska županija" ? "selected" : "";?>>Vukovarsko-srijemska županija županija</option>
                                  <option <?php echo $workplace == "Virovitičko-podravska županija" ? "selected" : "";?>>Virovitičko-podravksa županija</option>
                                  
                            </select>
                            @error('workplace')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




