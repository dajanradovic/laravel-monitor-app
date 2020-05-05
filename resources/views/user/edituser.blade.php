@extends('layouts.app')

@section('content')

<?php $originaldepartment= $user->department; ?>
<?php $originalworkplace= $user->workplace; ?>
<?php $department= old('department'); ?>
<?php $workplace= old('workplace'); ?>



<div class="container">
<div class="row">
<div class="col-md-12">
<nav aria-label="breadcrumb " style="margin-left: -15px;" >
  <ol class="breadcrumb bg-dark text-warning pull-left" style="margin-left: 0px;">
      <li class="breadcrumb-item active text-warning" aria-current="page">Users List</li>
	 <li class="breadcrumb-item text-warning " aria-current="page">Personal Profile</li>
   	 <li class="breadcrumb-item text-warning " aria-current="page">Edit user's details</li>
  </ol>
</nav>

</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit user\'s details') }}</div>

                <div class="card-body">
                    <form method="POST" action="/users/{{$user->id}}">
                        @csrf
                        @METHOD('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>

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
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') ?? $user->surname }}" required autocomplete="name" autofocus>

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
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?? $user->address }}" required autocomplete="name" autofocus>

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
                                <input id="town" type="text" class="form-control @error('town') is-invalid @enderror" name="town" value="{{ old('town') ?? $user->town }}" required autocomplete="name" autofocus>

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
                                  <option value="" disabled selected hidden>Choose your department</option>
                                  <option <?php echo $department == "Phone-agent" || $originaldepartment =="Phone-agent" ? "selected" : "";?>>Phone-agent</option>
                                  <option <?php echo $department == "Technical department" || $originaldepartment =="Technical department" ? "selected" : "";?>>Technical department</option>

                                  <option <?php echo $department == "Technician on terrain" || $originaldepartment =="Technician on terrain" ? "selected" : "";?>>Technician on terrain</option>
                                  <option <?php echo $department == "Supervisor" || $originaldepartment =="Supervisor" ? "selected" : "";?>>Supervisor</option>
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
                                  <option <?php echo $workplace == "Grad Zagreb" || $originalworkplace == "Grad Zagreb" ? "selected" : "";?>>Grad Zagreb</option>
                                  <option <?php echo $workplace == "Zagrebačka županija" ||$originalworkplace == "Zagrebačka županija" ? "selected" : "";?>>Zagrebačka županija</option>
                                  <option <?php echo $workplace == "Karlovačka županija" || $originalworkplace == "Karlovačka županija" ? "selected" : "";?>>Karlovačka županija</option>
                                  <option <?php echo $workplace == "Ličko-senjska županija" || $originalworkplace == "Ličko-senjska županija" ? "selected" : "";?>>Ličko-senjska županija</option>
                                  <option <?php echo $workplace == "Istarska županija" || $originalworkplace == "Istarska županija" ? "selected" : "";?>>Istarska županija</option>
                                  <option <?php echo $workplace == "Primorsko-goranska županija" || $originalworkplace =="Primorsko-goranska županija" ? "selected" : "";?>>Primorsko-goranska županija</option>
                                  <option <?php echo $workplace == "Karlovačka županija" || $originalworkplace == "Karlovačka županija" ? "selected" : "";?>>Karlovačka županija</option>
                                  <option <?php echo $workplace == "Krapinsko-zagorska županija" || $originalworkplace == "Krapinsko-zagorska županija" ? "selected" : "";?>>Krapinsko-zagorska županija</option>
                                  <option <?php echo $workplace == "Varaždinska županija" || $originalworkplace == "Varaždinska županija" ? "selected" : "";?>>Varaždinska županija</option>
                                  <option <?php echo $workplace == "Zadarska županija" || $originalworkplace == "Zadarska županija" ? "selected" : "";?>>Zadarska županija</option>
                                  <option <?php echo $workplace == "Koprivničko-križevačka županija" || $originalworkplace == "Koprivničko-križevačka županija" ? "selected" : "";?>>Koprivničko-križevačka županija</option>
                                  <option <?php echo $workplace == "Splitsko-dalmatinska županija" || $originalworkplace == "Splitsko-dalmatinska županija" ? "selected" : "";?>>Splitsko-dalmatinska županija</option>
                                  <option <?php echo $workplace == "Dubrovačko-neretvanska županija" || $originalworkplace == "Dubrovačko-neretvanska županija" ? "selected" : "";?>>Dubrovačko-neretvanska županija</option>
                                  <option <?php echo $workplace == "Šibensko-kninska županija" || $originalworkplace =="Šibensko-kninska županija" ? "selected" : "";?>>Šibensko-kninska županija</option>
                                  <option <?php echo $workplace == "Bjelovarsko-bilogorska županija" || $originalworkplace =="Bjelovarsko-bilogorska županija" ? "selected" : "";?>>Bjelovarsko-bilogorska županija</option>
                                  <option <?php echo $workplace == "Brodsko-posavska županija" || $originalworkplace == "Brodsko-posavska županija" ? "selected" : "";?>>Brodsko-posavska županija</option>
                                  <option <?php echo $workplace == "Osječko-baranjska županija" || $originalworkplace =="Osječko-baranjska županija" ? "selected" : "";?>>Osječko-baranjska županija</option>
                                  <option <?php echo $workplace == "Požeško-slavonska županija" || $originalworkplace =="Požeško-slavonska županija" ? "selected" : "";?>>Požeško-slavonska žušanija</option>
                                  <option <?php echo $workplace == "Sisačko-moslavačka županija" || $originalworkplace == "Sisačko-moslavačka županija" ? "selected" : "";?>>Sisačko-moslavačka županija</option>
                                  <option <?php echo $workplace == "Vukovarsko-srijemska županija" || $originalworkplace =="Vukovarsko-srijemska županija" ? "selected" : "";?>>Vukovarsko-srijemska županija županija</option>
                                  <option <?php echo $workplace == "Virovitičko-podravska županija" || $originalworkplace == "Virovitičko-podravska županija" ? "selected" : "";?>>Virovitičko-podravksa županija</option>
                                  
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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
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




