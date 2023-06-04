@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Submit Your Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" value=>
                                    <option value="">--Select your Gender--</option>
                                    <option value="Male" {{ old('gender') == "Male" ? "selected" : ""}}>Male</option>
                                    <option value="Female" {{ old('gender') == "Female" ? "selected" : ""}}>Female</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="caste" class="col-md-4 col-form-label text-md-right">{{ __('Caste') }}</label>

                            <div class="col-md-6">
                                <select name="caste" id="caste" class="form-control @error('caste') is-invalid @enderror" name="caste" value=>
                                    <option value="">--Select your caste--</option>
                                    <option value="Brahmin" {{ old('caste') == "Brahmin" ? "selected" : ""}}>Brahmin</option>
                                    <option value="Chhetri" {{ old('caste') == "Chhetri" ? "selected" : ""}}>Chhetri</option>
                                    <option value="Dalit" {{ old('caste') == "Dalit" ? "selected" : ""}}>Dalit</option>
                                    <option value="Aadibasi" {{ old('caste') == "Aadibasi" ? "selected" : ""}}>Aadibasi</option>
                                    <option value="Janajati" {{ old('caste') == "Janajati" ? "selected" : ""}}>Janajati</option>
                                </select>

                                @error('caste')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}"  autocomplete="phone_number" autofocus>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth (A.D.)') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" autocomplete="dob" autofocus>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="perma_address" class="col-md-4 col-form-label text-md-right">{{ __('Permanent Address') }}</label>

                            <div class="col-md-6">
                                <input id="perma_address" type="text" class="form-control @error('perma_address') is-invalid @enderror" name="perma_address" value="{{ old('perma_address') }}"  autocomplete="perma_address" autofocus>

                                @error('perma_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="high_school_name" class="col-md-4 col-form-label text-md-right">{{ __('High School Name') }}</label>

                            <div class="col-md-6">
                                <input id="high_school_name" type="text" class="form-control @error('high_school_name') is-invalid @enderror" name="high_school_name" value="{{ old('high_school_name') }}"  autocomplete="high_school_name" autofocus>

                                @error('high_school_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="high_school_gpa" class="col-md-4 col-form-label text-md-right">{{ __('High School GPA') }}</label>

                            <div class="col-md-6">
                                <input id="high_school_gpa" type="number" min="2" max="4" step="0.01" class="form-control @error('high_school_gpa') is-invalid @enderror" name="high_school_gpa" value="{{ old('high_school_gpa') }}"  autocomplete="high_school_gpa" autofocus>

                                @error('high_school_gpa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="parent_id" class="col-md-4 col-form-label text-md-right">{{ __('Parent Govt. ID') }}</label>

                            <div class="col-md-6">
                                <input id="parent_id" type="text" class="form-control @error('parent_id') is-invalid @enderror" name="parent_id" value="{{ old('parent_id') }}"  autocomplete="parent_id" autofocus>

                                @error('parent_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="your_photo" class="col-md-4 col-form-label text-md-right">{{ __('Your Photo') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="your_photo" id="your_photo" onchange="loadFile1(event)" class="form-control @error('your_photo') is-invalid @enderror" value="{{ old('your_photo') }}" ><br>
                                <img id="output1" class = "img-fluid"/>

                                <script>
                                    var loadFile1 = function(event) {
                                        var your_photo = document.getElementById('output1');
                                        your_photo.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                </script>	

                                @error('your_photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="citizenship_front" class="col-md-4 col-form-label text-md-right">{{ __('Citizenship Front') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="citizenship_front" id="citizenship_front" onchange="loadFile2(event)" class="form-control @error('citizenship_front') is-invalid @enderror" value="{{ old('citizenship_front') }}" ><br>
                                <img id="output2" class = "img-fluid"/>

                                <script>
                                    var loadFile2 = function(event2) {
                                        var citizenship_front = document.getElementById('output2');
                                        citizenship_front.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                </script>	


                                @error('citizenship_front')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="citizenship_back" class="col-md-4 col-form-label text-md-right">{{ __('Citizenship Back') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="citizenship_back" id="citizenship_back" onchange="loadFile4(event)" class="form-control @error('citizenship_back') is-invalid @enderror" value="{{ old('citizenship_back') }}" ><br>
                                <img id="output4" class = "img-fluid"/>

                                <script>
                                    var loadFile4 = function(event2) {
                                        var citizenship_back = document.getElementById('output4');
                                        citizenship_back.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                </script>	


                                @error('citizenship_back')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="marksheet_photo" class="col-md-4 col-form-label text-md-right">{{ __('Marksheet copy') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="marksheet_photo" id="marksheet_photo" onchange="loadFile3(event)" class="form-control @error('marksheet_photo') is-invalid @enderror" value="{{ old('marksheet_photo') }}"><br>
                                <img id="output3" class = "img-fluid"/>

                                <script>
                                    var loadFile3 = function(event) {
                                        var marksheet_photo = document.getElementById('output3');
                                        marksheet_photo.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                </script>	

                                
                                @error('marksheet_photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
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


@endsection
