<div class="my-2 shadow  text-white bg-dark p-1" id="">
  <div class="d-flex justify-content-between">
    <table class="ms-1">
      <td class="align-middle">{{@$suggestion->name}}</td>
      <td class="align-middle"> - </td>
      <td class="align-middle">{{@$suggestion->email}}</td>
      <td class="align-middle">
    </table>
    <div>
      <button id="create_request_btn" class="btn btn-primary me-1" onclick="sendRequest({{ @$suggestion->id }})">Connect</button>
    </div>
  </div>
</div>
