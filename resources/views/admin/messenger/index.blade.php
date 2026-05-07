@extends('admin.layouts.master')
@section('content')
  <section class="section">
    <section class="section">
      <div class="section-header">
        <h1>Chat Box</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Components</a></div>
          <div class="breadcrumb-item">Chat Box</div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Chat Boxes</h2>
        <p class="section-lead">The chat component and is equipped with a JavaScript API, making it easy for you to
          integrate with Back-end.</p>
        <div class="row align-items-center justify-content-center">
          <div class="col-md-3">
            <div class="card" style="height: 70vh;">
              <div class="card-header">
                <h4>Who's Online?</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                  @foreach ($chatUsers as $chatUser)
                    <li class="media chat-user-profile" data-id="{{ $chatUser->senderProfile->id }}">
                      <img alt="image" class="mr-3 rounded-circle" width="50"
                        src="{{ asset($chatUser->senderProfile->image) }}">
                      <div class="media-body">
                        <div class="mt-0 mb-1 font-weight-bold">{{ $chatUser->senderProfile->name }}</div>
                        <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i> Online</div>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="card chat-box" id="mychatbox" style="height: 70vh;">
              <div class="card-header">
                <h4>Chat with Rizal</h4>
              </div>
              <div class="card-body chat-content">
                {{-- <div class="chat-item chat-left" style=""><img src="../dist/img/avatar/avatar-1.png">
                  <div class="chat-details">
                    <div class="chat-text">Hi, dude!</div>
                    <div class="chat-time">11:19</div>
                  </div>
                </div> --}}
                {{-- <div class="chat-item chat-right" style=""><img src="../dist/img/avatar/avatar-2.png">
                  <div class="chat-details">
                    <div class="chat-text">Wat?</div>
                    <div class="chat-time">11:19</div>
                  </div>
                </div> --}}
              </div>
              <div class="card-footer chat-form">
                <form id="message_form">
                  <input type="text" class="form-control message-box" placeholder="Type a message" name="message">
                  <input type="hidden" name="receiver_id" id="receiver_id" value="">
                  <button class="btn btn-primary send-button">
                    <i class="far fa-paper-plane"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>
@endsection
@push('scripts')
  <script type="text/javascript">
    const mainChatInbox = $('.chat-content');

    function formatDateTime(dateTimeString) {
      const options = {
        year: 'numeric',
        month: 'short',
        day: '2-digit',
        hour: '2-digit',
        minute: '2-digit'
      }
      const formatDateTime = new Intl.DateTimeFormat('en-us', options).format(new Date(dateTimeString));
      return formatDateTime;
    }
    $(document).ready(function() {
      $('.chat-user-profile').on('click', function() {
        let receiverId = $(this).data('id');
        $('#receiver_id').val(receiverId);
        let chatUserName = $(this).find('h4').text();
        let receiverImage = $(this).find('img').attr('src');
        $.ajax({
          method: 'GET',
          url: '{{ route('admin.get-messages') }}',
          data: {
            receiver_id: receiverId
          },
          beforeSend: function() {
            mainChatInbox.html('');
            $('#chat-inbox-title').text(`Chat With ${chatUserName}`);
          },
          success: function(response) {
            $.each(response, function(index, value) {
              let message = `
                </div>
                   <div class="chat-item chat-left" style=""><img src="${receiverImage}">
                  <div class="chat-details">
                    <div class="chat-text">${value.message}</div>
                    <div class="chat-time">${formatDateTime(value.created_at)}</div>
                  </div>
                </div>
                `
              mainChatInbox.append(message);
            })
            // scroll to bottom
            // scrollBottom();
          },
          error: function(xhr, status, error) {

          },
          complete: function() {},
        })
      })

      $('#message_form').on('submit', function(e) {
        e.preventDefault();
        let formData = $(this).serialize();
        let messageData = $('.message-box').val();
        var forSubmitting = false;
        if (forSubmitting || messageData === "") {
          return;
        }
        // set message inbox
        let message = `
                </div>
                   <div class="chat-item chat-right" style=""><img src="${USER.image}">
                  <div class="chat-details">
                    <div class="chat-text">${messageData}</div>
                    <div class="chat-time"></div>
                  </div>
                </div>
                `
        mainChatInbox.append(message);
        // scrollBottom();
        $.ajax({
          method: 'POST',
          url: "{{ route('admin.send-messages') }}",
          data: formData,
          beforeSend: function() {
            $('.send-button').prop('disable', true);
            forSubmitting = true;
          },
          success: function(response) {
            $('.message-box').val('');
          },
          error: function(xhr, status, error) {
            $('.send-button').prop('disable', false);
            forSubmitting = false;
          },
          complete: function() {
            forSubmitting = false;
          },
        });
      })
    });
  </script>
@endpush
