$(document).ready(function() {
    console.log('ready')
    $('#gvJobs').DataTable();

    $('#btnSearch').on('click', function() {
        // Get form data
        const state = $('#ddlState').val();
        const jobTitle = $('#jobtitle').val();
        const company = $('#companies').val();
        const primarySkills = $('#primaryskills').val();
        const status = 0;

        // $('#gvJobs').DataTable()
        // // .columns(0).search(state)          // State column search
        // .columns(2).search(jobTitle)      // Job Title column search
        // // .columns(4).search(company)       // Company column search
        // .draw(); 

        // Make an AJAX POST request
        $.ajax({
            url: '/api/get-jobs',
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]'). attr('content'), // Add CSRF token for security
                state: state,
                jobTitle: jobTitle,
                company: company,
                primarySkills: primarySkills,
                status: status
            },
            success: function(response) {
                // $('#gvJobs').DataTable().clear();
                // var formattedData = response.map(function(job) {
                //     return [
                //         job.id,            // First column (ID)
                //         job.jobid,         // Second column (Job ID)
                //         job.jobTitle,      // Third column (Job Title)
                //         job.recruiter,     // Fourth column (Recruiter)
                //         job.opening,       // Fifth column (Opening)
                //         job.created_at,    // Sixth column (Created At)
                //         job.updated_at     // Seventh column (Updated At)
                //     ];
                // });
                // console.log(formattedData);
                // $('#gvJobs').DataTable().rows.add(formattedData);
                // $('#gvJobs').DataTable().draw();
            },
            error: function(error) {
                console.error('Error fetching jobs:', error);
                alert('An error occurred while fetching the jobs.');
            }
        });
    });



});