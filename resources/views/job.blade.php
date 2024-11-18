

<form id="form1" method="POST" class="auto-style2">
        
        <div class="container-1 ">
            <label class="auto-style6" ><strong>Job opening</strong></label><br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <!--<asp:Button id="btnSubmit0" runat="server" Text="Manage Jobs"  style=" background-color: #0078B7; color:white; border:none;  z-index: 1; position: absolute; top: 18px; left: 743px;" Height="38px" Width="133px" OnClick="btnSubmit0_Click" />-->
                       &nbsp;&nbsp;
       </div>
   
           <div class="container p-3" style="border:1px solid #ccc; width:900px; ">
               <div class="form-group row">
                   <label for=" txtJobTitle" class="col-sm-3 col-form-label">Job Title<span class="required-star">*</span></label>
                   <div class="col-sm-9">
                       <input type="text" id="txtJobTitle" name="txtJobTitle" required style="width:80%;" class="form-control"></input>
                       <span id="rfvJobTitle" class="error-message text-xs" style="color: red; display: none;">Job Title is required.</span>
                   </div>
               </div>
   
               
   
               <div class="form-group row">
               <label for="ddlJobType" class="col-sm-3 col-form-label">
                    Job Type<span class="required-star">*</span>
                    </label>
                    <div class="col-sm-9">
                        <select id="ddlJobType" name="job_type" class="form-control" style="width:80%;" required>
                            <option value="" disabled selected>Select Job Type</option>
                            <option value="1">Full-Time</option>
                            <option value="2">Part-Time</option>
                            <option value="3">Contract</option>
                        </select>
                        <span id="rfvJobType" class="error-message text-xs" style="color: red; display: none;">Job Type is required.</span>
                    </div>

               </div>
   
              
               <div class="form-group row">
               <label for="ddlRecruiter" class="col-sm-3 col-form-label">
                    Recruiter Assigned<span class="required-star">*</span>
                </label>
                <div class="col-sm-9">
                    <select id="ddlRecruiter" name="recruiter" class="form-control" style="width:80%;" required>
                    <option value="" disabled selected>Select a Job</option>
                        @if(count($recruiters) > 0)
                            @foreach($recruiters as $recruiter)
                                <option value="{{ $recruiter['id'] }}">{{ $recruiter['company'] }}</option>
                            @endforeach
                        @else
                            <option value="" disabled>No jobs available</option>
                        @endif
                    </select>
                    <span id="rfvRecruiter" class="error-message text-xs" style="color: red; display: none;">Recruiter assignment is required.</span>
                </div>

       </div>
   
   
             <div class="form-group row">
                <label for="ddlState" class="col-sm-3 col-form-label" style="width: 128px; color: black;">State:</label>
                <div class="col-sm-9">
                    <select id="ddlState" name="state" class="form-control" style="width:80%;"  required>
                    <option value="" disabled selected>Select a state</option>
        
                    @if(count($states) > 0)
                        @foreach($states as $state)
                            <option value="{{ $state['state_code'] }}">{{ $state['state_name'] }}</option>
                        @endforeach
                    @else
                        <option value="" disabled>No states available</option>
                    @endif

                    </select>
                    <span id="rfvState" class="error-message text-xs" style="color: red; display: none;">State is required</span>
                </div>

               </div>
   
   
   
               <div class="form-group row">
               <label for="txtSalaryFromMonthly" class="col-sm-3 col-form-label">
                    Salary Range (Monthly)<span class="required-star">*</span>
                </label>
                <div class="col-sm-9">
                    <div class="salary-range">
                        <input 
                            type="number" 
                            id="txtSalaryFromMonthly" 
                            name="salary_from_monthly" 
                            class="salary-input" 
                            style="max-width:250px; width:230px;" 
                            placeholder="From (Monthly)" required>
                        <input 
                            type="number" 
                            id="txtSalaryToMonthly" 
                            name="salary_to_monthly" 
                            class="salary-input" 
                            style="max-width:250px; width:230px;" 
                            placeholder="To (Monthly)" required>
                    </div>
                    <span id="rfvSalaryFromMonthly" class="error-message text-xs" style="color: red; display: none;">
                        Monthly salary 'From' is required.
                    </span>
                    <span id="rfvSalaryToMonthly" class="error-message text-xs" style="color: red; display: none;">
                        Monthly salary 'To' is required.
                    </span>
                </div>

               </div>
   
               <div class="form-group row">
                            <label for="txtSalaryFromCTC" class="col-sm-3 col-form-label">Salary Range (CTC)</label>
                <div class="col-sm-9 ">
                    <div class="salary-range relative">
                        <input type="number" id="txtSalaryFromCTC" class="salary-input" 
                            style="max-width: 250px; width: 230px;" 
                            placeholder="From (CTC)" required />
                        <input type="number" id="txtSalaryToCTC" class="salary-input" 
                            style="max-width: 250px; width: 230px;" 
                            placeholder="To (CTC)" required />
                    </div>
                    <div class="validation-message absolute text-xs   " style="color: red; display: none; left:1rem;" id="fromError">
                        CTC salary 'From' is required.
                    </div>
                    <div class="validation-message absolute text-xs " style="color: red; display: none; left:16rem" id="toError">
                        CTC salary 'To' is required.
                    </div>
                </div>
               </div>
   
               <div class="form-group row">
               <label for="txtNoOfOpening" class="col-sm-3 col-form-label">
                    No of Openings<span class="required-star">*</span>
                </label>
                <div class="col-sm-9">
                    <input type="number" id="txtNoOfOpening" class="form-control" style="width: 80%;" required />
                    <div class="validation-message text-xs" style="color: red; display: none;" id="noOfOpeningError">
                        No. of openings is required.
                    </div>
                </div>
               </div>
   
               <div class="form-group row">
               <label for="ddlCompany" class="col-sm-3 col-form-label">Company Name:</label>
                <div class="col-sm-9">
                    <select id="ddlCompany" class="form-control" style="width: 80%;" required>
                        <option value="" disabled selected>Select a Company</option>
                        <!-- Add your company options here -->
                        <option value="Company1">Company 1</option>
                        <option value="Company2">Company 2</option>
                        <option value="Company3">Company 3</option>
                    </select>
                    <div class="validation-message text-xs" style="color: red; display: none;" id="companyError">
                        Company Name is required.
                    </div>
                </div>
               </div>
   
               <div class="form-group row">
               <label for="ddlExperience" class="col-sm-3 col-form-label">
                    Experience (Years)<span class="required-star">*</span>
                </label>
                <div class="col-sm-9">
                    <select id="ddlExperience" class="form-control" style="width: 80%;" required>
                        <option value="" disabled selected>Select Experience</option>
                        <option value="0">Fresher</option>
                        <option value="1">1yr</option>
                        <option value="2">2yrs</option>
                        <option value="3">3yrs</option>
                        <option value="4">4yrs</option>
                        <option value="5">5yrs</option>
                        <option value="6">6yrs</option>
                        <option value="7">7yrs</option>
                        <option value="8">8yrs</option>
                        <option value="9">9yrs</option>
                        <option value="10">10+yrs</option>
                    </select>
                </div>

               </div>
   
              <div class="form-group row">
              <label for="jobstatus" class="col-sm-3 col-form-label">
                    Job Status<span class="required-star">*</span>
                </label>
                <div class="col-sm-9">
                    <select id="jobstatus" class="form-control" style="width: 80%;" disabled required>
                        <option value="0">In-Progress</option>
                        <option value="1">On-Hold</option>
                        <option value="2">Filled</option>
                        <option value="3">Cancelled</option>
                        <option value="4">Declined</option>
                        <option value="5">Inactive</option>
                    </select>
                </div>

           </div>
   
   
               <div class="form-group row">
                        <label for="ddlPrimarySkills" class="col-sm-3 col-form-label">Primary Skills</label>
            <div class="col-sm-9">
                <input type="text" id="PrimarySkills" class="form-control" style="width: 80%;" required />
                <div class="validation-message text-xs" style="color: red; display: none;" id="skillsError">
                    Primary Skills is required.
                </div>
            </div>
               </div>
   
               <div class="form-group row">
               <label for="txtJobDescription" class="col-sm-3 col-form-label">
                Job Description<span class="required-star">*</span>
            </label>
            <div class="col-md-9 col-sm-12">
                <textarea id="txtJobDescription" name="txtJobDescription" class="form-control" style="width: 80%; height: 100px;" required></textarea>
                <div class="validation-message text-xs" style="color: red; display: none;" id="jobDescError">
                    Job Description is required.
                </div>
            </div>
   
   
               </div>
   
               <div class="form-group row">
               <label for="fileUploadJobImage" class="col-sm-3 col-form-label">
                    Upload Job Image<span class="required-star">*</span>
                </label>
                <div class="col-sm-9">
                    <input type="file" id="fileUploadJobImage" class="form-control" style="width: 80%;" required />
                </div>
               </div>
   
              <div class="form-group row">
              <div class="col-sm-9 offset-sm-3">
                <!-- Place Cancel button first in the HTML -->
                <div class="button-container">
                    <button id="btnSubmit" type="submit" class="btn btn-primary" style="background-color: #0078B7; text-align: center; height: 35px; width: 82px;">
                        Submit
                    </button>
                    <button id="btnCancel" type="button" class="btn btn-cancel" style="text-align: center; height: 35px; width: 82px;">
                        Cancel
                    </button>
                </div>
            </div>
           </div>
   </div>
   
           </div>
   
          
       </form>

       <div class="modal fade show" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" >
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="successModalLabel">Success</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
                           Job created successfully! Job ID: <span id="jobIdSpan"></span>
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       </div>
                   </div>
               </div>
           </div>


    
       <script>
        var IsPostBack=false;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

       </script>

       <script>
    const jobTitleInput = document.getElementById('txtJobTitle');
    const errorMessage = document.getElementById('rfvJobTitle');

    jobTitleInput.addEventListener('input', function () {
        console.log('clicked')
        if (jobTitleInput.value.trim()) {
            errorMessage.style.display = 'none';
        } else {
            errorMessage.style.display = 'inline';
        }
    });
</script>
<script>
    const ddlJobType = document.getElementById('ddlJobType');
    const errorJobMessage = document.getElementById('rfvJobType');
    
    ddlJobType.addEventListener('change', function () {
        console.log('clicked')
        if (ddlJobType.value === "") {
            errorJobMessage.style.display = 'inline';
        } else {
            errorJobMessage.style.display = 'none';
        }
    });
</script>

<script>
    const ddlRecruiter = document.getElementById('ddlRecruiter');
    const errorRecruiteMessage = document.getElementById('rfvRecruiter');

    ddlRecruiter.addEventListener('change', function () {
        console.log('clicked')
        if (ddlRecruiter.value === "") {
            errorRecruiteMessage.style.display = 'inline';
        } else {
            errorRecruiteMessage.style.display = 'none';
        }
    });
</script>

<script>
    const ddlState = document.getElementById('ddlState');
    const errorStateMessage = document.getElementById('rfvState');

    ddlState.addEventListener('change', function () {
        console.log('clicked')
        if (ddlState.value === "") {
            errorStateMessage.style.display = 'inline';
        } else {
            errorStateMessage.style.display = 'none';
        }
    });

    function handleStateChange() {
        console.log("State selection changed:", ddlState.value);
        // Additional logic for state change can go here
    }
</script>


<script>
    const salaryFrom = document.getElementById('txtSalaryFromMonthly');
    const salaryTo = document.getElementById('txtSalaryToMonthly');
    const errorFrom = document.getElementById('rfvSalaryFromMonthly');
    const errorTo = document.getElementById('rfvSalaryToMonthly');

    function validateSalaryRange() {
        console.log('chere')
        let isValid = true;

        if (!salaryFrom.value.trim()) {
            errorFrom.style.display = 'inline';
            isValid = false;
        } else {
            errorFrom.style.display = 'none';
        }

        if (!salaryTo.value.trim()) {
            errorTo.style.display = 'inline';
            isValid = false;
        } else {
            errorTo.style.display = 'none';
        }

        return isValid;
    }

</script>
<script>
    // Example validation script
    document.getElementById("txtSalaryFromCTC").addEventListener("blur", function () {
        console.log('clicked')
        const fromError = document.getElementById("fromError");
        if (!this.value.trim()) {
            fromError.style.display = "block";
        } else {
            fromError.style.display = "none";
        }
    });

    document.getElementById("txtSalaryToCTC").addEventListener("blur", function () {
        console.log('clicked')
        const toError = document.getElementById("toError");
        if (!this.value.trim()) {
            toError.style.display = "block";
        } else {
            toError.style.display = "none";
        }
    });
</script>
<script>
    // Example validation script
    document.getElementById("txtNoOfOpening").addEventListener("blur", function () {
        console.log('clicked')
        const errorElement = document.getElementById("noOfOpeningError");
        if (!this.value.trim()) {
            errorElement.style.display = "block";
        } else {
            errorElement.style.display = "none";
        }
    });
</script>
<script>
    // Example validation script
    document.getElementById("ddlCompany").addEventListener("change", function () {
        console.log('clicked')
        const errorElement = document.getElementById("companyError");
        if (!this.value) {
            errorElement.style.display = "block";
        } else {
            errorElement.style.display = "none";
        }
    });
</script>
<script>
    // Example validation script
    document.getElementById("PrimarySkills").addEventListener("blur", function () {
        console.log('clicked')
        const errorElement = document.getElementById("skillsError");
        if (!this.value.trim()) {
            errorElement.style.display = "block";
        } else {
            errorElement.style.display = "none";
        }
    });
</script>

<!-- <script>
    // Example validation script for textarea
    document.getElementById("Jobdescription").addEventListener("blur", function () {
        console.log('clicked')
        const errorElement = document.getElementById("jobDescError");
        if (!this.value.trim()) {
            errorElement.style.display = "block";
        } else {
            errorElement.style.display = "none";
        }
    });
</script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<!-- <textarea id="Jobdescription" class="form-control" style="width: 80%; height: 100px;" required></textarea> -->
<!-- <script>
    let editorInstance;
    ClassicEditor
        .create(document.querySelector('#txtJobDescription'))
        .then(editor=>{
            editorInstance=editor;
        })
        .catch(error => {
            console.error(error);
        });
</script> -->

<script>
     const jobForm = document.getElementById('form1');
  const submitButton = document.getElementById('btnSubmit');

  // Function to validate the CKEditor content
//   function validateJobDescription() {
//     if (!editorInstance) {
//       console.error("Editor not initialized yet.");
//       return false;
//     }

//     // Get the content of the editor
//     const editorContent = editorInstance.getData().trim();

//     if (editorContent === "") {
//       // Show validation error and focus the editor
//       jobDescError.style.display = 'block';
//       editorInstance.editing.view.focus(); // Focus the CKEditor instance
//       return false; // Prevent form submission or further processing
//     } else {
//       // Hide validation error
//       jobDescError.style.display = 'none';
//       return true;
//     }
//   }

  // Add event listener for button click
  submitButton.addEventListener('click', function (e) {
     e.preventDefault();
        let jobData={
            recruiter : $('#ddlRecruiter').val(),
             jobTitle : $('#txtJobTitle').val(),
             jobType : $('#ddlJobType').val(),
             state : $('#ddlState').val(),
             salaryFromMonthly : $('#txtSalaryFromMonthly').val(),
             salaryToMonthly : $('#txtSalaryToMonthly').val(),
             salaryfromctc : $('#txtSalaryFromCTC').val(),
             salarytoctc : $('#txtSalaryToCTC').val(),
             opening : $('#txtNoOfOpening').val(),
             experience : $('#ddlExperience').val(),
             skills : $('#PrimarySkills').val(),
             jobDescription : $('#txtJobDescription').val(),
             company : $('#ddlCompany').val(),
             jobImage : $('#fileUploadJobImage').val(),
             jobstatus : $('#jobstatus').val(),
        }
        console.log('jobdata',jobData);

        $.ajax({
                url: '/api/profileDetails',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify( jobData ), 
                success: function(data){
                    console.log(data);
                        clear();
                         document.getElementById('jobIdSpan').innerText = data.jobID;
                         $('#successModal').modal('show');
                         
                },
                error: function(){
                    alert('error');
                }
            });
  });

  $('#successModal').on('hidden.bs.modal', function () {
    console.log('clearss')
        $(location).attr('href', '/second');
    });

  function clear(){
                console.log('cleared');
                $('#ddlRecruiter').val(''),
                        $('#txtJobTitle').val(''),
                         $('#ddlJobType').val(''),
                         $('#ddlState').val(''),
                         $('#txtSalaryFromMonthly').val(''),
                         $('#txtSalaryToMonthly').val(''),
                         $('#txtSalaryFromCTC').val(''),
                         $('#txtSalaryToCTC').val(''),
                         $('#txtNoOfOpening').val(''),
                         $('#ddlExperience').val(''),
                         $('#PrimarySkills').val(''),
                         $('#txtJobDescription').val(''),
                         $('#ddlCompany').val(''),
                         $('#fileUploadJobImage').val(''),
                        //  $('#jobstatus').val(''),
                         $('#btnSubmit').attr('disabled',true);
                         
            }

  $('#btnCancel').on('click',function(){
    console.log('check')
    clear();
});

  function toggleSubmitButton() {
    console.log('check',jobForm.checkValidity())
    if (jobForm.checkValidity()) {
        console.log('true')
      submitButton.disabled = false; // Enable the button
    } else {
      submitButton.disabled = true; // Disable the button
    }
  }

  // Attach event listeners to all form inputs for real-time validation
  const inputs = jobForm.querySelectorAll('input');
  inputs.forEach(input => {
    input.addEventListener('input', toggleSubmitButton);
  });

  // Initial check when the page loads
  toggleSubmitButton();
</script>

@push('styles')
        @vite('resources/css/job.css')
@endpush

@push('scripts')
    @vite('resources/js/job.js')
@endpush