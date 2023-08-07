<style>
    /* Add your CSS styles here */
    .section {
        display: none;
    }
</style>

<div class="row justify-content-center mt-5">
    <div class="col-12">
        <div class="card shadow text-white bg-dark">
            <div class="card-header">Coding Challenge - Network connections</div>
            <div class="card-body">
                <div class="btn-group w-100 mb-3" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="btnradio1" id="get_suggestions_btn">Suggestions ()</label>

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio2" id="get_sent_requests_btn">Sent Requests ()</label>

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio3" id="get_received_requests_btn">Received Requests()</label>

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio4" id="get_connections_btn">Connections ()</label>
                </div>
                <hr>
                <div id="content" class="d-none">
                    {{-- Display data here --}}
                </div>
                <div id="suggestions_section" class="section">
                    {{-- Display Suggestions section content --}}
                    <span class="fw-bold">Suggestions Blade</span>
                    @foreach($suggestions as $suggestion)
                        <x-suggestion :suggestion="$suggestion"/>
                    @endforeach
                </div>

                <div id="sent_requests_section" class="section">
                    {{-- Display Sent Requests section content --}}
                    <span class="fw-bold">Sent Request Blade</span>

                    @foreach($sentRequests as $sentRequest)
                        <x-request :mode="'sent'" :sentRequest="$sentRequest"></x-request>
                @endforeach
                    <!-- ... -->
                </div>

                <div id="received_requests_section" class="section">
                    {{-- Display Received Requests section content --}}
                    <span class="fw-bold">Received Request Blade</span>
                    @foreach($receivedRequests as $receivedRequest)
                        <x-request :mode="'received'" :sentRequest="$receivedRequest"/>
                    @endforeach
                </div>

                <div id="connections_section" class="section">
                    {{-- Display Connections section content --}}
                    <span class="fw-bold">Connection Blade (Click on "Connections in common" to see the connections in common component)</span>
                    @foreach($connections as $connection)
                        <x-connection  :connection="$connection"/>
                    @endforeach
                </div>

                <div id="skeleton" class="d-none">
                    @for ($i = 0; $i < 10; $i++)
                        <x-skeleton />
                    @endfor
                </div>

{{--                <span class="fw-bold">"Load more"-Button</span>--}}
{{--                <div class="d-flex justify-content-center mt-2 py-3 --}}{{-- d-none --}}{{--" id="load_more_btn_parent">--}}
{{--                    <button class="btn btn-primary" onclick="" id="load_more_btn">Load more</button>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>

<script>

</script>

</body>
</html>
