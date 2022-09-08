@extends("front.layouts.master")

@section("title",)
Contact
@endsection

@section("img","https://avatars.mds.yandex.net/i?id=65b3337d40de790732c93ce87f46883a-4076833-images-thumbs&n=13")
@section("content")

    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p><strong>Want to get in touch? Fill out the form below to send me a message ??</strong></p>
                    <div class="my-5">

                        <form id="contactForm"method="post" action="{{route('contact_post')}}">
                            @csrf
                                <div class="col-md-8">
                                    @if(session("success"))
                                        <div class="alert alert-success">
                                            {{session("success")}}
                                        </div>
                                    @endif
                                </div>
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-floating">
                                <input class="form-control" name="name" type="text" value="{{old("name")}}" placeholder="Enter your name..."  required/>
                                <label for="name">Name</label>

                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="email" name="email" value="{{old("email")}}" type="email" placeholder="Enter your email..."required/>
                                <label for="email">Email address</label>

                            </div>

                            <div class="form-floating">
                                <textarea class="form-control" id="message" name="message"  placeholder="Enter your message here..." style="height: 12rem" required>{{old("message")}}</textarea>
                                <label for="message">Message</label>

                            </div>
                                <br>
                            <div class="card-floating">
                                <select class="form-select" name="topic" required>
                                    <option @if(old("topic")=="About") selected @endif>About</option>
                                    <option @if(old("topic")=="Support")selected @endif>Support</option>
                                    <option @if(old("topic")=="General")selected @endif>General</option>
                                    <option @if(old("topic")=="Other")selected @endif>Other</option>

                                </select>
                            </div>
                            <br />

                            <!-- Submit Button-->
                            <button class="btn btn-primary text-uppercase " id="submitButton" type="submit">Send</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>

            @include("front.widgets.categoryWidget")
@endsection
