<div class="my-2 shadow text-white bg-dark p-1" id="">
  <div class="d-flex justify-content-between">
      @if ($mode == 'sent')
    <table class="ms-1">
      <td class="align-middle">{{@$sentRequest->receiver->name}}</td>
        <td class="align-middle"> - </td>
        <td class="align-middle">{{@$sentRequest->receiver->email}}</td>
{{--        <td class="align-middle">-</td>--}}
{{--        <td class="align-middle">{{@$sentRequest->accepted}}</td>--}}
      <td class="align-middle">
    </table>
      @else
          <table class="ms-1">
              <td class="align-middle">{{@$sentRequest->sender->name}}</td>
              <td class="align-middle"> - </td>
              <td class="align-middle">{{@$sentRequest->sender->email}}</td>
              {{--        <td class="align-middle">-</td>--}}
              {{--        <td class="align-middle">{{@$sentRequest->accepted}}</td>--}}
              <td class="align-middle">
          </table>
      @endif
    <div>
      @if ($mode == 'sent')
        <button id="cancel_request_btn_" class="btn btn-danger me-1"
          onclick="deleteRequest({{ @$sentRequest->id }})">Withdraw Request</button>
      @else
        <button id="accept_request_btn_" class="btn btn-primary me-1"
          onclick="acceptRequest({{ @$sentRequest->id }})">Accept</button>
      @endif
    </div>
  </div>
</div>
