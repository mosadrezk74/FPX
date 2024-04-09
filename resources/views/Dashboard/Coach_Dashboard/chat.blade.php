@extends('Dashboard.layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex"><h4 class="content-title mb-0 my-auto">Mail Coach
                            </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Chat</span></div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm main-content-app mb-4">
        <div class="col-xl-4 col-lg-5">
            <div class="card">
                <div class="main-content-left main-content-left-chat">
                    <nav class="nav main-nav-line main-nav-line-chat">
                        <a class="nav-link active" data-toggle="tab" href="">Recent Chat</a> <a class="nav-link" data-toggle="tab" href="">Groups</a> <a class="nav-link" data-toggle="tab" href="">Calls</a>
                    </nav>
                    <div class="main-chat-contacts-wrapper">
                        <label class="main-content-label main-content-label-sm">Active Contacts (5)</label>
                        <div class="main-chat-contacts" id="chatActiveContacts">
                            <!-- Active contacts list -->
                        </div>
                    </div>
                    <div class="main-chat-list" id="ChatList">
                        <!-- Chat list -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <a class="main-header-arrow" href="" id="ChatBodyHide"><i class="icon ion-md-arrow-back"></i></a>
                <div class="main-content-body main-content-body-chat">
                    <div class="main-chat-header">
                        <!-- Chat header -->
                    </div>
                    <div class="main-chat-body" id="ChatBody">
                        <!-- Chat messages -->
                    </div>
                </div>
                <div class="main-chat-footer">
                    <nav class="nav">
                        <a class="nav-link" data-toggle="tooltip" href="" title="Add Photo"><i class="fas fa-camera"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Attach a File"><i class="fas fa-paperclip"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Add Emoticons"><i class="far fa-smile"></i></a> <a class="nav-link" href=""><i class="fas fa-ellipsis-v"></i></a>
                    </nav><input class="form-control" placeholder="Type your message here..." type="text"> <a class="main-msg-send" href=""><i class="far fa-paper-plane"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <script>
        // Assuming you're using jQuery for Ajax requests
        $('#message-form').submit(function(e) {
            e.preventDefault();
            var sender = $('#sender').val();
            var message = $('#message-input').val();
            $.ajax({
                url: '/chat/send-message',
                method: 'POST',
                data: { sender: sender, message: message },
                success: function(response) {
                    // Handle success response
                    console.log('Message sent successfully');
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error('Error sending message:', error);
                }
            });
        });

    </script>
<script src="{{URL::asset('plugins/lightslider/js/lightslider.min.js')}}"></script>
 <script src="{{URL::asset('js/chat.js')}}"></script>
@endsection
