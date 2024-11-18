<form id="form1" style="background-color:white;">
    <!-- Search Form Container -->
    <div class="container">
        <h2 class="mb-2"><strong>Job opening</strong> Manage Job Openings</h2>
        <div class="search-container">
            <div>
                <label for="state">State</label>
                <select id="ddlState" class="form-control">
                    <option disabled selected value="">Select a state</option>
        
                    @if(count($states) > 0)
                        @foreach($states as $state)
                            <option value="{{ $state['state_code'] }}">{{ $state['state_name'] }}</option>
                        @endforeach
                    @else
                        <option value="" disabled>No states available</option>
                    @endif
                </select>
            </div>
            <div>
                <label for="jobtitle">Job Title</label>
                <input type="text" id="jobtitle" class="form-control" />
            </div>
            <div>
                <label for="companyy">Company</label>
                <input type="text" id="companies" class="form-control" />
            </div>
            <div>
                <label for="primaryskillss">Primary Skills</label>
                <input type="text" id="primaryskills" class="form-control" />
            </div>
            <div>
                <button id="btnSearch" type="button" class="btn btn-primary" style="background-color: #0078B7; height:35px; border:none; color:white; margin-top:10px;">Search</button>
                <button id="btnClear" type="button" class="btn btn-secondary" style="background-color:lightgrey; height:35px; border:none; margin-top:10px;">Clear</button>
            </div>
        </div>
    </div>

    <!-- Export Button -->
    <div id="exportLabel" style="padding: 20px;">
        <button id="export" type="button" class="btn btn-primary" style="background-color: #0078B7;">Export as Excel</button>
    </div>

    <!-- Job Data Table -->
    <div class="p-2">
    <table id="gvJobs" class="table table-striped" >
        <thead>
            <tr>
                <th>SNO</th>
                <th>Job Code</th>
                <th>Job Title</th>
                <th>Client Name</th>
                <th>No. of Openings</th>
                <th>Created</th>
                <th>Modified</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data rows will be dynamically added here -->
            @if(count($profiles) > 0)
                @foreach($profiles as $profile)
                    <tr value="{{ $profile['id'] }}">
                        <td>{{$profile['id']}}</td>
                        <td>{{$profile['jobid']}}</td>
                        <td>{{$profile['jobTitle']}}</td>
                        <td>{{$profile['recruiter']}}</td>
                        <td>{{$profile['opening']}}</td>
                        <td>{{$profile['created_at']}}</td>
                        <td>{{$profile['updated_at']}}</td>
                       
                        <td class="row">
                             <!-- Edit Link -->
                            <a href="Editjob.php?jobid={{ $profile['jobid'] }}" class="col edit-link">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <!-- Delete Button -->
                            <button class="btn-delete col" onclick="return confirmDelete('{{ $profile['jobid']}}')">
                                <i class="fas fa-trash-alt" style="color:red;"></i>
                            </button>

                            <!-- Status Toggle Icon -->
                            <i class="fas fa-lightbulb col" id="bulbIcon_{{ $profile['jobid'] }}" 
                            style="color: {{ $profile['jobStatus'] == '1' ? 'green' : 'red' }};" 
                            onclick="toggleStatus('{{ $profile['jobid'] }}');">
                            </i>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr value="" disabled>No jobs available</tr>
            @endif
        </tbody>
    </table>
    </div>

    <!-- Modal Popup -->
    <input type="hidden" id="hfJobId" />
    <div id="jobModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="modal-header">
                <h4 id="modalJobTitleText" class="modalText" style="color:darkblue;"></h4>
                <h5 id="modalJobCodeText" class="modalText" style="color:darkblue;"></h5>
            </div>
            <div class="modal-body">
                <p>State: <span id="modalStateText"></span></p>
                <p>No of Openings: <span id="modalOpeningsText"></span></p>
                <p>Experience: <span id="modalExperienceText"></span></p>
                <p>Client: <span id="modalClientNameText"></span></p>
                <p>Salary Range: <span id="modalSalaryRangeText"></span></p>
                <p>Status: <span id="modalStatusText"></span></p>
                <p>Hire Mode: <span id="modalHireModeText"></span></p>
                <p>Primary Skill: <span id="modalPrimarySkillText"></span></p>
                <p>Job Description: <span id="modalJobDescriptionText"></span></p>
            </div>
            <div class="modal-footer">
                <button id="btnCloseModal" type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>
</form>


<script type="text/javascript">
    
        function openJobModal(jobId) {
            document.getElementById('<%= hfJobId.ClientID %>').value = jobId;
            __doPostBack('LoadJobDetails', jobId);
        }
        function closeModal() {
            document.getElementById('jobModal').style.display = 'none';
        }
        function deleteClient(jobid) {
            if (confirm("Are you sure you want to delete this Job?")) {
                __doPostBack('DeleteClient', jobid);
            }
        }

        function toggleStatus(jobId) {
            var icon = document.getElementById("bulbIcon_" + jobId);

            // Check the current color to determine the action
            var newStatus = icon.style.color === "green" ? 1 : 0;
            var newColor = newStatus === 1 ? "red" : "green";

            // Toggle the icon color
            icon.style.color = newColor;

            // Make an AJAX call to update the status in the database
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "Jobmanage.aspx/UpdateJobStatus", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Optionally handle the server response here
                    console.log("Job status updated successfully");
                }
            };

            var data = JSON.stringify({ jobid: jobId, newStatus: newStatus });
            xhr.send(data);
        }

        function confirmDelete(jobid) {
            // Show confirmation dialog
            if (confirm("Are you sure you want to delete this job?")) {
                // Call the server method to set the job inactive if the user confirms
                PageMethods.SetJobInactive(jobid, onSuccess, onError);
            }
        }

        function onSuccess(result) {
            alert("Job has been set to inactive successfully.");
            // Optional: Refresh the page or update the UI
            location.reload();
        }

        function onError(error) {
            alert("Error setting job to inactive: " + error.get_message());
        }

    </script>


@push('styles')
        @vite('resources/css/joblist.css')
@endpush

@push('scripts')
    @vite('resources/js/joblist.js')
@endpush

