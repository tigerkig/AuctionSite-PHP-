<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <!-- <script src="https://smtpjs.com/v3/smtp.js"></script> -->
    <script src="js/bootstrap.bundle.min.js"></script>
	  <script src="js/script.js"></script>
    <link href="css/toastr.min.css" rel="stylesheet"/>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	  <script src="js/toastr.min.js"></script>
	  <script src="js/vanilla-masker.js"></script>
    <!--datepicker  -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>   
    <link rel="stylesheet" href="css/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!-- end datepicker -->
    
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body style="color:#51575c">

<div class="container py-5" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;">

  <div class="p-5 bg-white rounded shadow mb-5 container-height">

    <div class="card px-0 pt-4 pb-0 mt-3 mb-3" style="border:none">
      <div class="row">
        <div class="col-md-12 mx-0">
            <form id="msform">
                <!-- progressbar -->
                <ul id="progressbar">
                  
                    <li class="active" id="account" onclick="navigation('account')"></li>
                    <li id="personal" onclick="navigation('personal')"></li>
                    <li id="payment" onclick="navigation('payment')"></li>
                    <li id="confirm" onclick="navigation('confirm')"></li>
                </ul> <!-- fieldsets -->

            </form>
        </div>
      </div>
    </div>
    
    <div id="myTab1Content" class="tab-content">
      <div id="home3" role="tabpanel" aria-labelledby="send-tab" class="tab-pane fade px-4 py-5" style="padding-top:0px !important">
        <div class="row email_style">
          <div class="col-md-12"><h2>Your eClaim submission has been made successfully.</h2></div>
          <div class="col-md-12"><h2>Reference No.<span id="reference" style="color: #d12727"></span></h4></div>
          <div class="col-md-12"><h2>You will receive an email confirmation in respect of that claim submission soonest.</h4></div>
        </div>
      </div>

      <div id="home0" role="tabpanel" aria-labelledby="home-tab" class="row tab-pane fade px-4 py-5 show active " style="padding-top:0px !important;">
        <form class="needs-validation0" novalidate>
        
          <div class="row" style="padding-left:0px !important !important;display:flex">
            <div class="col-md-6">
              <div class="alert alert-primary alert-dismissible fade show">POLICY</div>
              <fieldset class="form-group border p-3">
                <legend class="w-auto px-2">Policy Information</legend>
                  <div>
                      <div class="form-group">
                        <label for="Policy_No">Policy No.</label>
                        <input type="text" class="form-control" id="Policy_No" aria-describedby="basic-addon3" required>
                        <div class="invalid-feedback">Please provide a valid Policy No.</div>
                      </div>

                      <div class="form-group">
                        <label for="">Holder Name</label>
                        <input type="text" class="form-control" id="Holder_Name" aria-describedby="basic-addon3" required>
                        <div class="invalid-feedback">Please provide a valid Holder Name.</div>
                      </div>

                      <div class="form-group">
                        <label for="">Insured Name</label>
                        <input type="text" class="form-control" id="Insured_Name" aria-describedby="basic-addon3" required>
                        <div class="invalid-feedback">Please provide a valid Insured Name.</div>
                      </div>

                      <div class="form-group">
                        <label for="">Claimant Name </label>
                        <input type="text" class="form-control" id="Claimant_Name" aria-describedby="basic-addon3" required>
                        <div class="invalid-feedback">Please provide a valid Claimant Name.</div>
                      </div>
                  </div>
              </fieldset>

              <fieldset class="form-group border p-3">
                <legend class="w-auto px-2">Contact Information</legend>
                  <div>
                      <div class="form-group">
                        <label for="">Person Name</label>
                        <input type="text" class="form-control" id="Person_Name" aria-describedby="basic-addon3" required>
                        <div class="invalid-feedback">Please provide a valid Person Name.</div>
                      </div>

                      <div class="form-group">
                        <label for="">Email Address</label>
                        <input type="email" class="form-control" id="email_Address" aria-describedby="basic-addon3" required>
                        <div class="invalid-feedback">Please provide a valid Email Address.</div>
                      </div>

                      <div class="form-group">
                        <label for="">Mobile No.</label>
                        <input type="text" class="form-control" id="Mobile_No" aria-describedby="basic-addon3" required>
                        <div class="invalid-feedback">Please provide a valid Mobile No.</div>
                      </div>

                  </div>
                  <label class="text-uppercase font_size" style="color:#e34141;text-align:justify"><strong>Important:</strong> This  eClaim form should be submitted by the Policy holder/Insured Person.</label>
              </fieldset>
            </div>
            <div class="col-md-6 ">
              <div class="alert alert-primary alert-dismissible fade show"> CLAIM</div>
              <fieldset class="form-group border p-3">
                <legend class="w-auto px-2">Claims Information</legend>
                  <div class="alert alert-info fade in  show font_size">
                    Are the claimant/Insured person also insured with any other insurance for the Insured person as a result of the same incident?
                  </div>
                  <div class="check-box col-md-12 row">
                    <div class="col-md-7">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="box-1">
                      <label class="form-check-label" for="box-1">
                        Yes, please state details
                      </label>
                    </div>
                    
                    <div class="col-md-5 ">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="box-2" checked>
                      <label class="form-check-label" for="box-2">
                        No
                      </label>
                    </div>
                  </div>
                  <div class="container md-form Claims_top check-box-padding check-box-padding-bottom" >
                      <textarea id="form7" class="md-textarea form-control" rows="3" style="display:none" required></textarea>
                      <div class="invalid-feedback">Please provide value.</div>
                  </div>
                  <label class="Claims-type">Claims Type</label>
                  <div class="container">
                    <div class="Claims-type-padding">
                      <input type="checkbox" id="Employee">
                      <label for="Employee">Employee's Compensation</label>
                    </div>
                    <div class="Claims-type-padding">
                      <input type="checkbox" id="Personal">
                      <label for="Personal"> Personal Accident</label>
                    </div>
                    <div class="Claims-type-padding">
                      <input type="checkbox" id="Repatriation">
                      <label for="Repatriation">Repatriation</label>
                    </div>
                    <div class="Claims-type-padding">
                      <input type="checkbox" id="Clinical">
                      <label for="Clinical">Clinical Expenses</label>
                    </div>
                    <div class="Claims-type-padding">
                      <input type="checkbox" id="Surgical">
                      <label for="Surgical">Surgical & Hospitalization Expenses</label>
                    </div>
                    <div class="Claims-type-padding">
                      <input type="checkbox" id="Dental">
                      <label for="Dental">Dental Expenses</label>
                    </div>
                    <div class="Claims-type-padding">
                      <input type="checkbox" id="Loss">
                      <label for="Loss">Loss of Services Cash Allowance</label>
                    </div>
                    <div class="Claims-type-padding">
                      <input type="checkbox" id="Replacement">
                      <label for="Replacement">Replacement of Helper Expenses</label>
                    </div>
                  </div>
              </fieldset>
            </div>
            <div class="col-md-12 check-box-padding next-previous" id="preview_next_1">
              <div class="col-md-3" style="padding-bottom:10px"><button type ="button" class = "btn btn-outline-primary col-md-12" disabled>PREVIOUS</button></div>
              <div class="col-md-3" style="padding-bottom:10px"><button type ="submit" class = "btn btn-outline-primary col-md-12" onclick="home1_show()">NEXT</button></div>
            </div>
          </div>

        </form>

      </div>

      <div id="home1" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5" style="padding-top:0px !important">
        <form class="needs-validation1" novalidate>
               
          <div class="row">
          
            <div class="Claims_top_ttt col-md-12 check-box-padding" id="Employee1" style="display:none">
              <fieldset class="form-group border p-3 fieldset_background">
                <legend class="w-auto px-2">Employee's Compensation</legend>
                    
                    <div class="container" style="margin-bottom:10px">
                      <div><label class="form-label">Date of Injury</label> </div>
                      <div><input type="text" class="form-control" id="datepicker" required><div class="invalid-feedback">Please provide value.</div></div>
                    </div>


                    <div class="container" style="margin-bottom:10px">
                      <div><label >Description of Incident</label> </div>
                      <div><textarea  class="md-textarea form-control" rows="3" id="Employee_Description" required></textarea><div class="invalid-feedback">Please provide value.</div></div>
                    </div>

                    <div class="container" style="margin-bottom:10px">
                      <div class="col-md-2 check-box-padding"><label >Sick Leave </label> </div>
                      <div class="row check-box-padding check-box">
                        <div class="col-md-6" style="padding-bottom:10px"><input  id="datepicker1" placeholder="From" required></div>
                        <div class="col-md-6"><input  id="datepicker2" placeholder="To" required></div>
                      </div>
                    </div>

                    <div class="container" style="margin-bottom:10px">
                      <div><label >Nature of Injury</label> </div>
                      <div><textarea class="md-textarea form-control" rows="2" id="Employee_Nature" required></textarea><div class="invalid-feedback">Please provide value.</div></div>
                    </div>
                    <div class="row check-box" style="margin-bottom:10px"> 
                      <div class="col-md-6">
                        <label class="Claims-type">Upload Documents</label>
                        <ol>
                          <li>Labour Department's Form 2/2A/2B</li>
                          <li>Medical Receipt(s)</li>
                          <li>Mozilla Firefox</li>
                          <li>Medical Certificate(s)/Report(s)</li>
                          <li>Other(s)</li>
                        </ol>
                      </div>
                      <div class="col-md-6" style="padding-top:3%">
                        <div class="form-group">
                            <div id="uploaded_file_1"></div>
                            <label>Select File to Upload(pdf, doc, image)</label>
                            <input type="hidden" id="file_name_1">
                            <input id='files_1' type="file" class="form-control" accept="image/*,.pdf,.doc" style="padding:3px;margin-bottom:10px" multiple required>
                            <div class="invalid-feedback">Please provide value.</div>
                        </div>
                        <div class="form-group">
                          <button onclick="data_upload(event,1)" class = "btn btn-outline-primary col-md-12">UPLOAD</button>
                        </div>
                      </div>
              </fieldset>
            </div>

            <div class="Claims_top_ttt col-md-12 check-box-padding" id="Personal1" style="display:none">
              <fieldset class="form-group border p-3 fieldset_background">
                <legend class="w-auto px-2">Personal Accident</legend>
                    
                    <div class="container" style="margin-bottom:10px">
                      <div><label >Date of Injury</label> </div>
                      <div><input  id="datepicker4"  required></div>
                    </div>
                    <div class="container" style="margin-bottom:10px">
                      <div><label >Description of Incident</label> </div>
                      <div><textarea  class="md-textarea form-control" rows="3" id="Personal_Description" required></textarea><div class="invalid-feedback">Please provide value.</div></div>
                    </div>
                    <div class="container" style="margin-bottom:10px">
                      <div class="col-md-2 check-box-padding"><label >Sick Leave </label> </div>
                      <div class="row check-box-padding check-box">
                        <div class="col-md-6" style="padding-bottom:10px"><input  id="datepicker5" placeholder="From" required></div>
                        <div class="col-md-6"><input  id="datepicker6" placeholder="To" required></div>
                      </div>
                    </div>
                    <div class="container" style="margin-bottom:10px">
                      <div><label >Nature of Injury</label> </div>
                      <div><textarea class="md-textarea form-control" rows="2" id="Personal_Nature" required></textarea><div class="invalid-feedback">Please provide value.</div></div>
                    </div>
                    <div class="container"><label >Is the Insured person fully recovered?</label> </div>
                    <div class="row check-box col-md-12">

                      <div class="col-md-6">
                        <input class="form-check-input" type="radio" name="exam" id="Personal_Accident_1" checked>
                        <label class="form-check-label" for="Personal_Accident_1" >
                          Yes
                        </label>
                      </div>
                      
                      <div class="col-md-6 ">
                        <input class="form-check-input" type="radio" name="exam" id="Personal_Accident_2">
                        <label class="form-check-label" for="Personal_Accident_2">
                          No, please state details, e.g. what medical treatment(s) will be received & how long the sick leave being granted:									
                        </label>
                      </div>
                    </div>
                    <div class="container md-form Claims_top check-box-padding-bottom" >
                        <textarea id="form8" class="md-textarea form-control" rows="3" style="display:none" required></textarea>
                        <div class="invalid-feedback">Please provide value.</div>
                    </div>
                    <div class="row check-box" style="margin-bottom:10px"> 
                      <div class="col-md-6 ">
                        <label class="Claims-type">Upload Documents</label>
                        <ol>
                          <li>Medical Receipt(s)</li>
                          <li>Medical Certificate(s)</li>
                          <li>Death Certificate</li>
                          <li>Police Report(s)</li>
                          <li>Other(s)</li>
                        </ol>
                      </div>
                      <div class="col-md-6" style="padding-top:3%">
                        <div class="form-group">
                          <div id="uploaded_file_2"></div>
                            <label>Select File to Upload(pdf, doc, image)</label>
                            <input type="hidden" id="file_name_2">
                            <input id='files_2' type="file" class="form-control" accept="image/*,.pdf,.doc" style="padding:3px;margin-bottom:10px" multiple required>
                            <div class="invalid-feedback">Please provide value.</div>
                        </div>
                        <div class="form-group">
                          <button onclick="data_upload(event,2)" class = "btn btn-outline-primary col-md-12">UPLOAD</button>
                        </div>
                      </div>
              </fieldset>
            </div>

            <div class="Claims_top_ttt col-md-12 check-box-padding" id="Repatriation11" style="display:none">
              <fieldset class="form-group border p-3 fieldset_background">
                <legend class="w-auto px-2">Repatriation  </legend>
                    
                    <div class="container" style="margin-bottom:10px">
                      <div><label >Date of Death / Serious Sickness / Injury	</label> </div>
                      <div><input  id="datepicker7"  required></div>
                    </div>

                    <div class="container" style="margin-bottom:10px">
                      <div><label >Description of Incident</label> </div>
                      <div><textarea  class="md-textarea form-control" rows="3" id="Repatriation_Description" required></textarea><div class="invalid-feedback">Please provide value.</div></div>
                    </div>

                    <div class="container" style="margin-bottom:10px">
                      <div><label >Reason of Injury</label> </div>
                      <div><textarea class="md-textarea form-control" rows="2" id="Reason_Description" required></textarea><div class="invalid-feedback">Please provide value.</div></div>
                    </div>
                    <div class="container"><label>Is the Insured person fully recovered?</label> </div>
                    <div class="row check-box col-md-12">
                      <div class="col-md-6">
                        <input class="form-check-input" type="radio" name="exam" id="Repatriation1" checked>
                        <label class="form-check-label" for="Repatriation1">
                          Yes
                        </label>
                      </div>
                      
                      <div class="col-md-6 ">
                        <input class="form-check-input" type="radio" name="exam" id="Repatriation2">
                        <label class="form-check-label" for="Repatriation2">
                          No, please state details, e.g. what medical treatment(s) will be received & how long the sick leave being granted:		
                        </label>
                      </div>
                    </div>
                    <div class="container md-form Claims_top check-box-padding-bottom" >
                        <textarea id="form9" class="md-textarea form-control" rows="3" style="display:none" required></textarea>
                        <div class="invalid-feedback">Please provide value.</div>
                    </div>
                    <div class="row check-box" style="margin-bottom:10px"> 
                      <div class="col-md-6 ">
                        <label class="Claims-type">Upload Documents</label>
                        <ol>
                          <li>Repatriation Expense Receipt</li>
                          <li>Employment Contact</li>
                          <li>Certificate by a Registered Medical Practitioner as the Insured helper is medically unfit to work leading to an early termination of their employment contract.</li>
                          <li>Other(s)</li>
                        </ol>
                      </div>
                      <div class="col-md-6" style="padding-top:3%">
                        <div class="form-group">
                          <div id="uploaded_file_3"></div>
                          <label>Select File to Upload(pdf, doc, image)</label>
                          <input type="hidden" id="file_name_3">
                          <input id='files_3' type="file" class="form-control" accept="image/*,.pdf,.doc" style="padding:3px;margin-bottom:10px" multiple required>
                          <div class="invalid-feedback">Please provide value.</div>
                        </div>
                        <div class="form-group">
                          <button onclick="data_upload(event,3)" class = "btn btn-outline-primary col-md-12">UPLOAD</button>
                        </div>
                      </div>
              </fieldset>
            </div>

            <div class="Claims_top_ttt col-md-12 check-box-padding" id="Clinical1" style="display:none">
              <fieldset class="form-group border p-3 fieldset_background">
                <legend class="w-auto px-2">Clinical Expenses  </legend>
                    
                    <div class="container" style="margin-bottom:10px">
                      <div><label >Date of Medical Consulation</label> </div>
                      <div><input  id="datepicker8" required></div>
                    </div>

                    <div class="row check-box col-md-12 check-box-padding-bottom">
                      <div class="col-md-6">
                        <input class="form-check-input" type="radio" name="example" id="Clinical_Expense_1" checked>
                        <label class="form-check-label" for="Clinical_Expense_1">
                          Clinical Expense
                        </label>
                      </div>
                      
                      <div class="col-md-6 ">
                        <input class="form-check-input" type="radio" name="example" id="Bonesetter_Expense">
                        <label class="form-check-label" for="Bonesetter_Expense">
                          Bonesetter Expense
                        </label>
                      </div>
                    </div>

                    <div class="container" style="margin-bottom:10px">
                      <div><label >Diagnosis</label> </div>
                      <div><textarea  class="md-textarea form-control" rows="3" id="Clinical_Diagnosis" required></textarea><div class="invalid-feedback">Please provide value.</div></div>
                    </div>

                    <div class="row Claims_top" style="margin-bottom:10px;display:flex">
                      <div class="col-md-4" ><label style="padding-top:6px">Total Claimed Expense(s)	HK$</label> </div>
                      <div class="col-md-8"><input type="text" step="0.01" class="md-textarea form-control" id="Clinical_Total" required><div class="invalid-feedback">Please provide value.</div></div>
                    </div>
                    <div class="container"><label>Is the Insured person fully recovered?</label> </div>
                    <div class="row check-box col-md-12">
                      <div class="col-md-6">
                        <input class="form-check-input" type="radio" name="exam" id="Clinical_Expenses_1" checked>
                        <label class="form-check-label" for="Clinical_Expenses_1">
                          Yes
                        </label>
                      </div>
                      
                      <div class="col-md-6 ">
                        <input class="form-check-input" type="radio" name="exam" id="Clinical_Expenses_2">
                        <label class="form-check-label" for="Clinical_Expenses_2">
                          No, please state details, e.g. what medical treatment(s) will be received & how long the sick leave being granted:		
                        </label>
                      </div>
                    </div>
                    <div class="container md-form Claims_top check-box-padding-bottom" >
                        <textarea id="form10" class="md-textarea form-control" rows="3" style="display:none" required></textarea>
                    </div>
                    <div class="row check-box" style="margin-bottom:10px"> 
                      <div class="col-md-6 ">
                        <label class="Claims-type">Upload Documents</label>
                        <ol>
                          <li>Medical Receipt(s)</li>
                          <li>Medical Certificate(s)/Report(s)</li>
                          <li>Other(s)</li>
                        </ol>
                      </div>
                      <div class="col-md-6" style="padding-top:3%">
                        <div class="form-group">
                          <div id="uploaded_file_4"></div>
                          <label>Select File to Upload(pdf, doc, image)</label>
                          <input type="hidden" id="file_name_4">
                          <input id='files_4' type="file" class="form-control" accept="image/*,.pdf,.doc" style="padding:3px;margin-bottom:10px" multiple required>
                          <div class="invalid-feedback">Please provide value.</div>
                        </div>

                        <div class="form-group">
                          <button onclick="data_upload(event,4)" class = "btn btn-outline-primary col-md-12">UPLOAD</button>
                        </div>
                      </div>
              </fieldset>
            </div>

            <div class="Claims_top_ttt col-md-12 check-box-padding" id="Surgical1" style="display:none">
              <fieldset class="form-group border p-3 fieldset_background">
                <legend class="w-auto px-2">Surgical & Hospitalization Expense</legend>
                    
                    <div class="container" style="margin-bottom:10px">
                      <div><label >Date of Sickness / Injury</label> </div>
                      <div><input  id="datepicker9"  required></div>
                    </div>

                    <div class="container" style="margin-bottom:10px">
                      <div><label >Description of Incident</label> </div>
                      <div><textarea  class="md-textarea form-control" rows="3" id="Surgical_Description" required></textarea><div class="invalid-feedback">Please provide value.</div></div>
                    </div>

                    <div class="container" style="margin-bottom:10px">
                      <div><label >Diagonsis</label> </div>
                      <div><textarea  class="md-textarea form-control" rows="2" id="Surgical_Diagonsis" required></textarea><div class="invalid-feedback">Please provide value.</div></div>
                    </div>

                    <div class="row Claims_top" style="margin-bottom:10px;display:flex">
                      <div class="col-md-4" ><label style="padding-top:6px">Total Claimed Expense(s)	HK$</label> </div>
                      <div class="col-md-8"><input type="text" step="0.01" class="md-textarea form-control" id="Surgical_Total" required><div class="invalid-feedback">Please provide value.</div></div>
                    </div>

                    <div class="row check-box" style="margin-bottom:10px"> 
                      <div class="col-md-6 ">
                        <label class="Claims-type">Upload Documents</label>
                        <ol>
                          <li>Medical Receipt(s)</li>
                          <li>Medical Certificate(s)</li>
                          <li>Medical Report(s) / Examination Report(s)</li>
                          <li>Police Report(s)</li>
                          <li>Other(s)</li>
                        </ol>
                      </div>
                      <div class="col-md-6" style="padding-top:3%">
                        <div class="form-group">
                            <div id="uploaded_file_5"></div>
                            <label>Select File to Upload(pdf, doc, image)</label>
                            <input type="hidden" id="file_name_5">
                            <input id='files_5' type="file" class="form-control" accept="image/*,.pdf,.doc" style="padding:3px;margin-bottom:10px" multiple required>
                            <div class="invalid-feedback">Please provide value.</div>
                        </div>
                        <div class="form-group">
                          <button onclick="data_upload(event,5)" class = "btn btn-outline-primary col-md-12">UPLOAD</button>
                        </div>
                      </div>
              </fieldset>
            </div>

            <div class="Claims_top_ttt col-md-12 check-box-padding" id="Dental1" style="display:none">
              <fieldset class="form-group border p-3 fieldset_background">
                <legend class="w-auto px-2">Dental Expenses</legend>
                    
                    <div class="container" style="margin-bottom:10px">
                      <div><label >Date of Medical Consulation</label> </div>
                      <div><input  id="datepicker10"  required></div>
                    </div>

                    <div class="container" style="margin-bottom:10px">
                      <div><label >Diagonsis</label> </div>
                      <div><textarea  class="md-textarea form-control" rows="2" id="Dental_Diagonsis" required></textarea><div class="invalid-feedback">Please provide value.</div></div>
                    </div>

                    <div class="row Claims_top" style="margin-bottom:10px;display:flex">
                      <div class="col-md-4" ><label style="padding-top:6px">Total Claimed Expense(s)	HK$</label> </div>
                      
                      <div class="col-md-8"><input type="text" step="0.01" class="md-textarea form-control" id="Dental_Total" required><div class="invalid-feedback">Please provide value.</div></div>
                    </div>
                    
                    <div class="row check-box" style="margin-bottom:10px"> 
                      <div class="col-md-6 ">
                        <label class="Claims-type">Upload Documents</label>
                        <ol>
                          <li>Medical Receipt(s)</li>
                          <li>Medical Certificate(s)/Report(s)</li>
                          <li>Other(s)</li>
                        </ol>
                      </div>
                      <div class="col-md-6" style="padding-top:3%">
                        <div class="form-group">
                            <div id="uploaded_file_6"></div>
                            <label>Select File to Upload(pdf, doc, image)</label>
                            <input type="hidden" id="file_name_6">
                            <input id='files_6' type="file" class="form-control" accept="image/*,.pdf,.doc" style="padding:3px;margin-bottom:10px" multiple required>
                            <div class="invalid-feedback">Please provide value.</div>
                        </div>
                        <div class="form-group">
                          <button onclick="data_upload(event,6)" class = "btn btn-outline-primary col-md-12">UPLOAD</button>
                        </div>
                      </div>
              </fieldset>
            </div>

            <div class="Claims_top_ttt col-md-12 check-box-padding" id="Loss1" style="display:none">
              <fieldset class="form-group border p-3 fieldset_background">
                <legend class="w-auto px-2">Loss of Services Cash Allowance</legend>
                    
                    <div class="container" style="margin-bottom:10px">
                      <div><label >Date of Medical Consulation</label> </div>
                      <div><input  id="datepicker11" required></div>
                    </div>

                    <div class="container" style="margin-bottom:10px">
                      <div><label >Diagonsis</label> </div>
                      <div><textarea  class="md-textarea form-control" rows="2" id="Loss_Diagonsis" required></textarea><div class="invalid-feedback">Please provide value.</div></div>
                    </div>

                    <div class="container" style="margin-bottom:10px">
                      <div class="col-md-12 check-box-padding"><label >Period of Hospital Confinement</label> </div>
                      <div class="row check-box-padding check-box">
                        <div class="col-md-6 " style="padding:15px"><input  id="datepicker12" placeholder="From" required></div>
                        <div class="col-md-6 " style="padding:15px"><input  id="datepicker13" placeholder="To" required></div>
                      </div>
                    </div>
                    
                    <div class="row check-box" style="margin-bottom:10px"> 
                      <div class="col-md-6 ">
                        <label class="Claims-type">Upload Documents</label>
                        <ol>
                          <li>Proof of Hospital Confinement</li>
                          <li>Medical Certificate(s)/Report(s)</li>
                          <li>Other(s)</li>
                        </ol>
                      </div>
                      <div class="col-md-6" style="padding-top:3%">
                        <div class="form-group">
                            <div id="uploaded_file_7"></div>
                            <label>Select File to Upload(pdf, doc, image)</label>
                            <input type="hidden" id="file_name_7">
                            <input id='files_7' type="file" class="form-control" accept="image/*,.pdf,.doc" style="padding:3px;margin-bottom:10px" multiple required>
                            <div class="invalid-feedback">Please provide value.</div>
                        </div>
                        <div class="form-group">
                          <button onclick="data_upload(event,7)" class = "btn btn-outline-primary col-md-12">UPLOAD</button>
                        </div>
                      </div>
              </fieldset>
            </div>

            <div class="Claims_top_ttt col-md-12 check-box-padding" id="Replacement1" style="display:none">
              <fieldset class="form-group border p-3 fieldset_background">
                <legend class="w-auto px-2">Replacement of Helper Expenses</legend>

                    <div class="container" style="margin-bottom:10px">
                      <div><label >Reason of Replacement</label> </div>
                      <div><textarea  class="md-textarea form-control" rows="2" id="Replacement_Reason" required></textarea><div class="invalid-feedback">Please provide value.</div></div>
                    </div>

                    <div class="row Claims_top" style="margin-bottom:10px;display:flex">
                      <div class="col-md-4" ><label style="padding-top:6px">Total Claimed Expense(s)	HK$</label> </div>
                      <div class="col-md-8"><input type="text" step="0.01" class="md-textarea form-control" id="Replacement_Total" required><div class="invalid-feedback">Please provide value.</div></div>
                    </div>
                    
                    <div class="row check-box" style="margin-bottom:10px"> 
                      <div class="col-md-6 ">
                        <label class="Claims-type">Upload Documents</label>
                        <ol>
                          <li>Employment Contract</li>
                          <li>Certificate by a Registered Medical Practitioner as the Insured helper is medically unfit to work leading to an early termination of their employment contract.</li>
                          <li>Receipt for agent fee expense for hiring replacement helper</li>
                          <li>Proof of replacement of domestic helper</li>
                          <li>Other(s)</li>
                        </ol>
                      </div>
                      <div class="col-md-6" style="padding-top:3%">
                        <div class="form-group">
                            <div id="uploaded_file_8"></div>
                            <label>Select File to Upload(pdf, doc, image)</label>
                            <input type="hidden" id="file_name_8">
                            <input id='files_8' type="file" class="form-control" accept="image/*,.pdf,.doc" style="padding:3px;margin-bottom:10px" multiple required>
                            <div class="invalid-feedback">Please provide value.</div>
                        </div>
                        <div class="form-group">
                          <button onclick="data_upload(event,8)" class = "btn btn-outline-primary col-md-12">UPLOAD</button>
                        </div>
                      </div>
                    </div>
              </fieldset>
            </div>

            <div class="Claims_top_ttt col-md-12 check-box-padding">
              <fieldset class="form-group border p-3 fieldset_background">
                <legend class="w-auto px-2">Loss / damage to Home / Household Content / Home Buildings	</legend>
                    <div class="container">
                      <div style="text-align: end; padding-top:20px" >
                        <button type="button" class = "btn btn-outline-primary" data-toggle="modal" data-target="#myModal">Add</button>
                      </div>
                      <div class="col-md-12 check-box-padding"><label class="Claims-type">Details of damaged or lost properties</label></div>
                      
                      <div class="card card-cascade narrower"  style="margin-bottom:30px">
                          <div id="table_responsive">
                            <!--Table-->
                            <table role="table" style="width:100%">

                              <thead role="rowgroup">
                                <tr role="row">
                                  <th role="columnheader">Description of property</th>
                                  <th role="columnheader">Date of...</th>
                                  <th role="columnheader">Original...</th>
                                  <th role="columnheader">Repair /...</th>
                                  <th role="columnheader">Claim...</th>
                                  <th role="columnheader">Status</th>
                                </tr>
                              </thead>

                              <tbody role="rowgroup" id="tbody">
                              </tbody>

                              <tfoot role="rowgroup" id="tfoot">
                                <tr style=" background: aliceblue;">
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td>Sub Total</td>
                                  <td id="subtotal">0</td>
                                  <td></td>
                                </tr>
                              </tfoot>
                            </table>
                            <div style="display:none; width:100%; background: aliceblue" id="subtotal_hidden">
                                <div style="width:50%;text-align:center">Sub Total</div>
                                <div style="width:50%;text-align:center" id="subtotal_1">0</div>
                              </div>
                          </div>
                          
                      </div>
                    </div>

                    <div class="row check-box" style="margin-bottom:10px"> 
                      <div class="col-md-6">
                        <label class="Claims-type">Upload (if any applicable)</label>
                        <ol>
                          <li>Photograph showing the damaged propert (ies)</li>
                          <li>Purchase invoice / receipt of the lost/ damaged propert(ies)</li>
                          <li>Repair/ Replacement quotation(s) of the lost/ damaged propert(ies)</li>
                          <li>Other(s)</li>
                        </ol>
                      </div>

                      <div class="col-md-6" style="padding-top:3%">
                        <div class="form-group">
                          <div id="uploaded_file_9"></div>
                            <label>Select File to Upload(pdf, doc, image)</label>
                            <input type="hidden" id="file_name_9">
                            <input id='files_9' type="file" class="form-control" accept="image/*,.pdf,.doc" style="padding:3px;margin-bottom:10px" multiple required>
                            <div class="invalid-feedback">Please provide value.</div>
                        </div>
                        <div class="form-group">
                          <button onclick="data_upload(event,9)" class = "btn btn-outline-primary col-md-12">UPLOAD</button>
                        </div>
                      </div>

                    </div>
              </fieldset>
            </div>

            <div class="rrr col-md-12 check-box-padding">
              <div class="row check-box" style="margin-bottom:10px"> 
                <div class="col-md-12 ">
                  <label class="Claims-type" style='font-size: 20px;font-weight: bold;'>Declaration & Authorization	</label>
                  <ol style="padding-left:30px">
                    <li>I/We declare that the above information is in all respect true and complete to the best of my/ our knowledge and belief</li>
                    <li>It is agreed that upon request by XXXXX, I/We shall make a statutory declaration to re-affirm the genuineness of all information contained in this claim submission and</li>
                    <li>I/We believe that the facts stated in this claim form are true and correct. I acknowledge that the Insurers will rely upon the information supplied by me/ the policyholder/ the insured person, which I verily and honestly believe to be true and correct, in prosecuting or defending any claims or proceedings in future, and the signatory/ the policyholders/ insured person under this policy, if so required by the Insurers, will be asked and are bound to sign any court documents on the basis of information provided herein.</li>
                  </ol>
                </div>
              </div>
              

              <div class="row">
                <div class="col-md-6 Claims_top" style="margin-bottom:10px">
                  <div class=" check-box-padding" ><label>Name of Applicant:</label> </div>
                  <div class=" check-box-padding"><input class="md-textarea form-control" id="Name_of_Applicant" required><div class="invalid-feedback">Please provide Name of Applicant.</div></div>
                </div>

                <div class="col-md-6 Claims_top" style="margin-bottom:10px" id="date_time_style">
                  <div class=" check-box-padding"><label >Submission Date & Time</label> </div>
                  <div class=" check-box-padding"><input  id="datepicker_Submission" required><div class="invalid-feedback">Please provide Submission Date & Time.</div></div>
                </div>
              </div>

            </div>
            
            <div class=" col-md-12 check-box-padding">
              <div class="col-md-12 check-box-padding next-previous " id="preview_next_2">
                <div class="col-md-3" style="padding-bottom:10px"><button type = "button" class = "btn btn-outline-primary col-md-12" onclick="home_show()">PREVIOUS</button></div>
                <div class="col-md-3" style="padding-bottom:10px"><button type = "submit" class = "btn btn-outline-success col-md-12" id="preview" >PREVIEW</button></div>
              </div>
            </div>
          </div>

        </form>
      </div>

      <div id="home2" role="tabpanel" aria-labelledby="preview-tab" class="tab-pane fade px-4 py-5 " style="padding-top:0px !important">
        <div class="row" style="padding:0px !important;">
          <div class="col-md-6 ">
            <fieldset class="form-group border p-3 ">
              <legend class="w-auto px-2">Policy Information</legend>
                <div>
                    <div class="form-group">
                      <label  >Policy No.</label>
                      <input type="text" class="form-control" id="Policy_No_1" aria-describedby="basic-addon3" name="Policy_No" disabled="">
                    </div>

                    <div class="form-group">
                      <label >Holder Name</label>
                      <input type="text" class="form-control" id="Holder_Name_1" aria-describedby="basic-addon3" name="Holder_Name" disabled="">
                    </div>

                    <div class="form-group">
                      <label >Insured Name</label>
                      <input type="text" class="form-control" id="Insured_Name_1" aria-describedby="basic-addon3" name="Insured_Name" disabled="">
                    </div>

                    <div class="form-group">
                      <label >Claimant Name </label>
                      <input type="text" class="form-control" id="Claimant_Name_1" aria-describedby="basic-addon3" name="Claimant_Name" disabled="">
                    </div>
                </div>
            </fieldset>
          </div>
            
          <div class="col-md-6 ">
            <fieldset class="form-group border p-3">
              <legend class="w-auto px-2">Contact Information</legend>
                <div>
                    <div class="form-group">
                      <label >Person Name</label>
                      <input type="text" class="form-control" id="Person_Name_1" aria-describedby="basic-addon3" disabled="">
                    </div>
                    <div class="form-group">
                      <label >email Address</label>
                      <input type="email" class="form-control" id="email_Address_1" aria-describedby="basic-addon3" disabled="">
                    </div>
                    <div class="form-group">
                      <label >Mobile No.</label>
                      <input type="text" class="form-control" id="Mobile_No_1" aria-describedby="basic-addon3" disabled="">
                    </div>
                </div>
            </fieldset>
          </div>
          
          <div class="col-md-12" id="Claims_Information_2" style="display:none">
            <fieldset class="form-group border p-3">
              <legend class="w-auto px-2">Claims Information</legend>
                <div class="alert alert-info fade in alert-dismissible show ">
                  Are the claimant/Insured person also insured with any other insurance for the Insured person as a result of the same incident?
                </div>
                <div class="container md-form Claims_top check-box-padding check-box-padding-bottom">
                    <textarea id="Claims_Information_view" class="md-textarea form-control" rows="3" disabled=""></textarea>
                </div>
            </fieldset>
          </div>

          <div class="col-md-12 preview_top" id="Employee2" style="display:none">
            <fieldset class="form-group border p-3 fieldset_background">
              <legend class="w-auto px-2">Employee's Compensation</legend>
                  
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Date of Injury</label> </div>
                    <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" id="Employee_show_1" disabled=""></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Description of Incident</label> </div>
                    <div><textarea class="md-textarea form-control" rows="3" id="Employee_show_2" disabled=""></textarea></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div class="col-md-2 check-box-padding"><label>Sick Leave </label> </div>
                    <div class="col-md-12 check-box-padding check-box">
                      <div class="col-md-6 " style="padding-left:0px"><input class="md-textarea form-control" id="Employee_show_3" disabled=""></div>
                      <div class="col-md-6 " style="padding-right:0px"><input class="md-textarea form-control" id="Employee_show_4" disabled=""></div>
                    </div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Nature of Injury</label> </div>
                    <div><textarea class="md-textarea form-control" rows="2" id="Employee_show_5" disabled=""></textarea></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Uploaded files</label> </div>
                    <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" id="Employee_show_6" disabled=""></div>
                  </div>
            </fieldset>
          </div>

          <div class="col-md-12 preview_top" id="Personal2" style="display:none">
            <fieldset class="form-group border p-3 fieldset_background">
              <legend class="w-auto px-2">Personal Accident</legend>
                  
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Date of Injury</label> </div>
                    <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" id="Personal_show_1" disabled=""></div>

                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Description of Incident</label> </div>
                    <div><textarea class="md-textarea form-control" rows="3" id="Personal_show_2" disabled=""></textarea></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div class="col-md-2 check-box-padding"><label>Sick Leave </label> </div>
                    <div class="col-md-12 check-box-padding check-box">
                      <div class="col-md-6 " style="padding-left:0px"><input class="md-textarea form-control" id="Personal_show_3" disabled=""></div>
                      <div class="col-md-6 " style="padding-right:0px"><input class="md-textarea form-control" id="Personal_show_4" disabled=""></div>
                    </div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Nature of Injury</label> </div>
                    <div><textarea class="md-textarea form-control" rows="2" id="Personal_show_5" disabled=""></textarea></div>
                  </div>
                  <div class="container" style="margin-bottom:10px" id="Personal_recovered">
                    <div><label>Is the Insured person fully recovered?</label></div>
                    <div><textarea class="md-textarea form-control" rows="2" id="Personal_show_6" disabled=""></textarea></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Uploaded files</label> </div>
                    <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" id="Personal_show_7" disabled=""></div>
                  </div>
            </fieldset>
          </div>

          <div class="col-md-12 preview_top" id="Repatriation3" style="display:none">
            <fieldset class="form-group border p-3 fieldset_background">
              <legend class="w-auto px-2">Repatriation</legend>
                  
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Date of Death / Serious Sickness / Injury</label> </div>
                    <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" id="Repatriation_show_1" disabled=""></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Description of Incident</label> </div>
                    <div><textarea class="md-textarea form-control" rows="3" id="Repatriation_show_2" disabled=""></textarea></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Reason of Injury</label> </div>
                    <div><textarea class="md-textarea form-control" rows="2" id="Repatriation_show_3" disabled=""></textarea></div>
                  </div>
                  <div class="container" style="margin-bottom:10px" id="Repatriation_recovered">
                    <div><label>Is the Insured person fully recovered?</label> </div>
                    <div><textarea class="md-textarea form-control" rows="2" id="Repatriation_show_4" disabled=""></textarea></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Uploaded files</label> </div>
                    <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" id="Repatriation_show_5" disabled=""></div>
                  </div>
            </fieldset>
          </div>

          <div class="col-md-12 preview_top" id="Clinical2" style="display:none">
            <fieldset class="form-group border p-3 fieldset_background">
              <legend class="w-auto px-2">Clinical Expenses</legend>
                  
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Date of Medical Consulation</label> </div>
                    <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" id="Clinical_show_1" disabled=""></div>
                  </div>
                  <div class="check-box col-md-12 check-box-padding-bottom">
                    <div class="col-md-6">
                      <input class="form-check-input" type="radio" name="example1" id="Clinical_show_check_1" disabled="" checked="">
                      <label class="form-check-label" for="Clinical_show_check_1">
                        Clinical Expense
                      </label>
                    </div>
                    
                    <div class="col-md-6 ">
                      <input class="form-check-input" type="radio" name="example1" id="Clinical_show_check_2" disabled="">
                      <label class="form-check-label" for="Clinical_show_check_2">
                        Bonesetter Expense
                      </label>
                    </div>
                  </div>

                  <div class="container" style="margin-bottom:10px">
                    <div><label>Diagnosis</label> </div>
                    <div><textarea class="md-textarea form-control" rows="3" id="Clinical_show_2" disabled=""></textarea></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Total Claimed Expense(s) HK$</label> </div>
                    <div class="col-md-12 check-box-padding"><input type="text" step="0.01" class="md-textarea form-control" id="Clinical_show_3" disabled=""></div>
                  </div>
                  <div class="container" style="margin-bottom:10px" id="Clinical_recovered">
                    <div><label>Is the Insured person fully recovered?</label> </div>
                    <div><textarea class="md-textarea form-control" rows="2" id="Clinical_show_4" disabled=""></textarea></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Uploaded files</label> </div>
                    <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" id="Clinical_show_5" disabled=""></div>
                  </div>
            </fieldset>
          </div>

          <div class="col-md-12 preview_top" id="Surgical2" style="display:none">
            <fieldset class="form-group border p-3 fieldset_background">
              <legend class="w-auto px-2">Surgical &amp; Hospitalization Expense</legend>
                  
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Date of Sickness / Injury</label> </div>
                    <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" id="Surgical_show_1" disabled=""></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Description of Incident</label> </div>
                    <div><textarea class="md-textarea form-control" rows="3" id="Surgical_show_2" disabled=""></textarea></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Diagonsis</label> </div>
                    <div><textarea class="md-textarea form-control" rows="2" id="Surgical_show_3" disabled=""></textarea></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Total Claimed Expense(s) HK$</label> </div>
                    <div class="col-md-12 check-box-padding"><input type="text" step="0.01" class="md-textarea form-control" id="Surgical_show_4" disabled=""></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Uploaded files</label> </div>
                    <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" id="Surgical_show_5" disabled=""></div>
                  </div>
            </fieldset>
          </div>

          <div class="col-md-12 preview_top" id="Dental2" style="display:none">
            <fieldset class="form-group border p-3 fieldset_background">
              <legend class="w-auto px-2">Dental Expenses</legend>
                  
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Date of Medical Consulation</label> </div>
                    <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" id="Dental_show_1" disabled=""></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Diagonsis</label> </div>
                    <div><textarea class="md-textarea form-control" rows="3" id="Dental_show_2" disabled=""></textarea></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Total Claimed Expense(s) HK$</label> </div>
                    <div class="col-md-12 check-box-padding"><input type="text" step="0.01" class="md-textarea form-control" id="Dental_show_3" disabled=""></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Uploaded files</label> </div>
                    <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" id="Dental_show_4" disabled=""></div>
                  </div>
            </fieldset>
          </div>

          <div class="col-md-12 preview_top" id="Loss2" style="display:none">
            <fieldset class="form-group border p-3 fieldset_background">
              <legend class="w-auto px-2">Loss of Services Cash Allowance</legend>
                  
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Date of Medical Consulation</label> </div>
                    <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" id="Loss_show_1" disabled=""></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Diagonsis</label> </div>
                    <div><textarea class="md-textarea form-control" rows="3" id="Loss_show_2" disabled=""></textarea></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div class="col-md-3 check-box-padding"><label>Period of Hospital Confinement</label> </div>
                    <div class="col-md-12 check-box-padding check-box">
                      <div class="col-md-6 " style="padding-left:0px"><input class="md-textarea form-control" id="Loss_show_3" disabled=""></div>
                      <div class="col-md-6 " style="padding-right:0px"><input class="md-textarea form-control" id="Loss_show_4" disabled=""></div>
                    </div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Uploaded files</label> </div>
                    <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" id="Loss_show_5" disabled=""></div>
                  </div>
            </fieldset>
          </div>

          <div class="col-md-12 preview_top" id="Replacement2" style="display:none">
            <fieldset class="form-group border p-3 fieldset_background">
              <legend class="w-auto px-2">Replacement of Helper Expenses</legend>
                  
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Reason of Replacement</label> </div>
                    <div><textarea class="md-textarea form-control" rows="3" id="Replacement_show_1" disabled=""></textarea></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Total Claimed Expense(s) HK$</label> </div>
                    <div class="col-md-12 check-box-padding"><input type="text" step="0.01" class="md-textarea form-control" id="Replacement_show_2" disabled=""></div>
                  </div>
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Uploaded files</label> </div>
                    <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" id="Replacement_show_3" disabled=""></div>
                  </div>
            </fieldset>
          </div>

          <div class="col-md-12 preview_top" id="damage2">
            <fieldset class="form-group border p-3 fieldset_background">
              <legend class="w-auto px-2">Loss / damage to Home / Household Content / Home Buildings</legend>
                  
                  <div class="container" style="margin-bottom:10px">
                    <div><label>Details of damaged or lost properties</label> </div>
                    <div class="col-md-12 check-box-padding">
                      <p id="showData" class="table-responsive"></p>
                    </div>
                  </div>

                  <div class="container" style="margin-bottom:10px">
                    <div><label>Uploaded files</label> </div>
                    <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" id="damage_show_5" disabled=""></div>
                  </div>
            </fieldset>
          </div>

          <div class="col-md-12 preview_top" id="user2">
            <fieldset class="form-group border p-3 fieldset_background">
              
              <legend class="w-auto px-2">User Information</legend>
                <div class="row " style="padding-right:0px">
                  <div class="col-md-6 Claims_top" >
                    <div><label>Name of Applicant:</label> </div>
                    <div><input class="md-textarea form-control" id="user_show_1" disabled=""></div>
                  </div>

                  <div class="col-md-6 Claims_top">
                    <div><label>Submission Date &amp; Time</label> </div>
                    <div><input class="md-textarea form-control" id="user_show_2" disabled="" style=""></div>
                  </div>
                </div>
            </fieldset>
          </div>

          <div class="col-md-12 ">
            <div class="I_agree_margin">
              <input type="checkbox" id="I_agree">
              <label for="I_agree">I/We have read and agreed to all the declarations, terms and conditions and Personal Information Collection Statement.</label>
            </div>
            <div class="col-md-12 check-box-padding next-previous row" style="margin-left:0px">
              <div class="col-md-6 check-box-padding" style="margin-bottom:10px"><button type="button" class="btn btn-outline-primary col-md-4" onclick="before()">PREVIOUS</button></div>
              <div class="col-md-6 check-box-padding" style="text-align:end">
                <button type="button" class="btn btn-outline-danger col-md-4" style="margin-bottom:10px" onclick="cancel()">CANCEL</button>
                <button type="submit" class="btn btn-outline-success col-md-4" style="margin-bottom:10px" id="submit" onclick="submit()" disabled>CONFIRM</button>
              </div>
            </div>
          </div>
        <div>
      </div>

    </div>

  </div>
</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Details of damaged or lost properties</h4>
      </div>
      <div class="modal-body">
        <div class="container" style="margin-bottom:10px">
          <div><label >Description of property	</label> </div>
          <div><textarea  class="md-textarea form-control" rows="2" id="modal_Replacement_Reason"></textarea></div>
        </div>

        <div class="container" style="margin-bottom:10px">
          <div><label >Date of purchase or installation(DDMMYYYY)</label> </div>
          <div><input id="datepicker14"></div>
        </div>

        <div class="container" style="margin-bottom:10px">
          <div><label >Original purchase price(HK$)</label> </div>
          <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" step="0.01" type="number" id="modal_price"></div>
        </div>

        <div class="container" style="margin-bottom:10px">
          <div><label >Repair / Replacement cost (if applicable)(HK$)</label> </div>
          <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" step="0.01" type="number" id="modal_cost"></div>
        </div>

        <div class="container" style="margin-bottom:10px">
          <div><label >Claim amount(HK$)</label> </div>
          <div class="col-md-12 check-box-padding"><input class="md-textarea form-control" step="0.01" type="number" id="modal_amount"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger col-md-2" data-dismiss="modal" id="close">Close</button>
        <button type="button" class="btn btn-outline-success col-md-2" id="modal_ok">OK</button>
      </div>
    </div>
  </div>
</div>
<div class="spinner-border text-primary" style="display:none;width:5rem; height:5rem;position:fixed;top:45%;right:43%" role="status" id="screen_loading" >
  <span class="sr-only">Loading...</span>
</div>
</body>
</html>
<script>
  VMasker(document.getElementById("Clinical_Total")).maskMoney();
  VMasker(document.getElementById("Replacement_Total")).maskMoney();
  VMasker(document.getElementById("Dental_Total")).maskMoney();
  VMasker(document.getElementById("Surgical_Total")).maskMoney();

  VMasker(document.getElementById("Mobile_No")).maskPattern('+(999) 9999-9999');
  VMasker(document.getElementById("Policy_No")).maskPattern('9AA/99999/99');


</script>
<!-- 
<form class="row g-3 needs-validation" novalidate>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">First name</label>
    <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" onclick="qwe()">Submit form</button>
  </div>
</form> -->