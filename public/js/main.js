var skeletonId = 'skeleton';
var contentId = 'content';
var skipCounter = 0;
var takeAmount = 10;


function getRequests(mode) {
  // your code here...
}

function getMoreRequests(mode) {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getConnections() {
  // your code here...
}

function getMoreConnections() {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getConnectionsInCommon(userId, connectionId) {
  // your code here...
}

function getMoreConnectionsInCommon(userId, connectionId) {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getSuggestions() {
  // your code here...
}

function getMoreSuggestions() {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function sendRequest(suggestionId) {
    ajax('/send-connection-request', 'POST', [], {"receiver_id": suggestionId});
}

function deleteRequest(requestId) {
    ajax('/withdraw-connection-request', 'POST', [], {"connection_request_id": requestId});
}

function acceptRequest(requestId) {
    ajax('/accept-connection-request', 'POST', [], {"connection_request_id": requestId});
}

function removeConnection(connectionId) {
    ajax('/remove-connection-request', 'POST', [], {"connection_request_id": connectionId});
}

$(function () {
  //getSuggestions();
});

// Function to toggle the visibility of sections
function toggleSections(sectionToShow) {
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => {
        if (section.id === sectionToShow) {
            section.style.display = 'block';
        } else {
            section.style.display = 'none';
        }
    });
}
// Set the "Suggestions" section as visible by default
toggleSections('suggestions_section');

// Add click event listeners to the radio buttons
const suggestionsBtn = document.getElementById('btnradio1');
suggestionsBtn.addEventListener('click', function() {
    toggleSections('suggestions_section');
});

const sentRequestsBtn = document.getElementById('btnradio2');
sentRequestsBtn.addEventListener('click', function() {
    toggleSections('sent_requests_section');
});

const receivedRequestsBtn = document.getElementById('btnradio3');
receivedRequestsBtn.addEventListener('click', function() {
    toggleSections('received_requests_section');
});

const connectionsBtn = document.getElementById('btnradio4');
connectionsBtn.addEventListener('click', function() {
    toggleSections('connections_section');
});
