@extends('layouts.main')
@section('css')
<style>
    .disabled-class {
        pointer-events: none;
        background-color: gray;
        border: gray;
    }
  #photoModal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, .7);
    z-index: 50;
    display: flex;
}
#photoModalContent {
/*    display: flex;*/
    background-color: #fff;
    margin: auto;
/*    overflow: hidden;*/
    position: relative;
    border-radius: 10px;
    width: 55rem;
    height: 35rem;
}
#photoModalClose {
    position: absolute;
    bottom: 100%;
    right: 0;
/*    color: #fff;*/
    background-color: #fff;
    font-size: .75rem;
    padding: .3rem .5rem;
    border-radius: 50%;
    margin-bottom: 15px;
}
#photoModalFrame {
	width: 100%;
	height: 100%;
}
.modalCon {
	overflow: hidden;
	width: 100%;
	height: 100%;
    border-radius: 10px;
}
.close-modal { display: none!important; }
.enlarge_btn { font-size: .8rem;display: flex;text-align:center;align-items:center;justify-content: center;gap: .3rem;cursor: pointer; }

</style>
@endsection
@section('content')
<div class="mt-3 mb-2 lh-90">
    <p class="m-0 fs-22 lead mb-2">Upload Documents</p>
    <p class="m-0 fs-12 fw-600">( उम्मीदवार दस्तावेज़ अपलोड करें। )</p>
</div>
@php $count = 1; @endphp
<form action="" id="candidateUpload">
    <div class="mb-5 table-responsive">
        <table class="table table- bg-transparent align-middle">
            <tr class="text-center align-middle fs-12 fw-600">
                <td class="theme-2 col-1">Sl. No.</td>
                <td class="theme-2 col-3">
                    <p class="m-0 fs-12 fw-600">Document Name <span class="m-0 fs-10 fw-600">( दस्तावेज़ का नाम )</span>
                    </p>
                </td>
                <td class="theme-2 col-2">Action</td>
                <td class="theme-2 col-2">Preview</td>
            </tr>
            <tr class="theme-1 text-center">
                <td class="theme-1">{{$count++}}</td>
                <td class="theme-1 text-start">
                    <p class="m-0 fs-12 fw-600">Photo</p>
                    <small class="m-0 mx-auto fs-10 text-danger fw-500">MIN: 10 KB, MAX: 100KB | FORMAT:.jpg,
                        .jpeg,</small>
                </td>
                <td class="theme-1">
                    <label for="upload_photo"
                        class="btn p-0 py-1 px-3 fs-12 fw-500 rounded-0 my-1 my-md-0 btn-primary"><i
                            class="bi bi-cloud-arrow-up"></i> UPLOAD</label>
                    <input type="file" id="upload_photo" name="upload_photo" class="d-none upload_doc" data-id="photo"
                        accept="image/jpg, image/jpeg">
                </td>
                <td class="theme-1">
                    @if(isset($candidate->photo))
                    <span class="text-blue-500 font-medium hover:underline cursor-pointer"
                        style="height: 5rem!important;" onclick="enlargeDoc(this)">
                        <iframe src="/storage/{{$candidate->photo}}" width="100%" height="100" class="bg-gray-100"
                            title="PHOTO" scrolling="no" allowfullscreen></iframe><br>
                        <span class="enlarge_btn"><i class="bi bi-arrows-fullscreen"></i> Enlarge</span>
                    </span>
                    @else
                    <span class="text-muted fs-12 lead">- No Preview Available -</span>
                    @endif
                </td>
            </tr>
            <tr class="text-center">
                <td class="theme-1">{{$count++}}</td>
                <td class="theme-1 text-start">
                    <p class="m-0 fs-12 fw-600">Signature</p>
                    <small class="m-0 mx-auto fs-10 text-danger fw-500">MIN: 10 KB, MAX: 100KB | FORMAT:.jpg,
                        .jpeg,</small>
                </td>
                <td class="theme-1">
                    <label for="upload_sign"
                        class="btn p-0 py-1 px-3 fs-12 fw-500 rounded-0 my-1 my-md-0 btn-primary"><i
                            class="bi bi-cloud-arrow-up"></i> UPLOAD</label>
                    <input type="file" id="upload_sign" name="upload_sign" class="d-none upload_doc" data-id="sign"
                        accept="image/jpg, image/jpeg">
                </td>
                <td class="theme-1">
                    @if(isset($candidate->signature))
                    <span class="text-blue-500 font-medium hover:underline cursor-pointer"
                        style="height: 5rem!important;" onclick="enlargeDoc(this)">
                        <iframe src="/storage/{{$candidate->signature}}" width="100%" height="100" class="bg-gray-100"
                            title="signature" scrolling="no" allowfullscreen></iframe><br>
                        <span class="enlarge_btn"><i class="bi bi-arrows-fullscreen"></i> Enlarge</span>
                    </span>
                    @else
                    <span class="text-muted fs-12 lead">- No Preview Available -</span>
                    @endif
                </td>
            </tr>
            @if($candidate->qualification_id == 2)
            <tr class="text-center">
                <td class="theme-1">{{$count++}}</td>
                <td class="theme-1 text-start">
                    <p class="m-0 fs-12 fw-600">Class 10th Matric Exam Passed In Any Recognized Board In India</p>
                    <p class="m-0 fs-12">( भारत में किसी भी मान्यता प्राप्त बोर्ड से कक्षा 10वीं की मैट्रिक परीक्षा
                        उत्तीर्ण)</p>
                    <small class="m-0 mx-auto fs-10 text-danger fw-500">MIN: 10 KB, MAX: 300KB | FORMAT:.pdf</small>
                </td>
                <td class="theme-1">
                    <label for="uploadX" class="btn p-0 py-1 px-3 fs-12 fw-500 rounded-0 my-1 my-md-0 btn-primary"><i
                            class="bi bi-cloud-arrow-up"></i> UPLOAD</label>
                    <input type="file" id="uploadX" name="uploadX" class="d-none upload_doc" data-id="uploadX"
                        accept=".pdf">
                </td>
                <td class="theme-1">
                    @if(isset($candidate->uploadX))
                    <span class="text-blue-500 font-medium hover:underline cursor-pointer"
                        style="height: 5rem!important;" onclick="enlargeDoc(this)">
                        <iframe src="/storage/{{$candidate->uploadX}}" width="100%" height="100" class="bg-gray-100"
                            title="uploadX" scrolling="no" allowfullscreen></iframe><br>
                        <span class="enlarge_btn"><i class="bi bi-arrows-fullscreen"></i> Enlarge</span>
                    </span>
                    @else
                    <span class="text-muted fs-12 lead">- No Preview Available -</span>
                    @endif
                </td>
            </tr>
            @elseif($candidate->qualification_id == 1)
            <tr class="text-center">
                <td class="theme-1">{{$count++}}</td>
                <td class="theme-1 text-start">
                    <p class="m-0 fs-12 fw-600">Class 10th Matric Exam Passed In Any Recognized Board In India</p>
                    <p class="m-0 fs-12">( भारत में किसी भी मान्यता प्राप्त बोर्ड से कक्षा 10वीं की मैट्रिक परीक्षा
                        उत्तीर्ण)</p>
                    <small class="m-0 mx-auto fs-10 text-danger fw-500">MIN: 10 KB, MAX: 300KB | FORMAT:.pdf</small>
                </td>
                <td class="theme-1">
                    <label for="uploadX" class="btn p-0 py-1 px-3 fs-12 fw-500 rounded-0 my-1 my-md-0 btn-primary"><i
                            class="bi bi-cloud-arrow-up"></i> UPLOAD</label>
                    <input type="file" id="uploadX" name="uploadX" class="d-none upload_doc" data-id="uploadX"
                        accept=".pdf">
                </td>
                <td class="theme-1">
                    @if(isset($candidate->uploadX))
                    <span class="text-blue-500 font-medium hover:underline cursor-pointer"
                        style="height: 5rem!important;" onclick="enlargeDoc(this)">
                        <iframe src="/storage/{{$candidate->uploadX}}" width="100%" height="100" class="bg-gray-100"
                            title="uploadX" scrolling="no" allowfullscreen></iframe><br>
                        <span class="enlarge_btn"><i class="bi bi-arrows-fullscreen"></i> Enlarge</span>
                    </span>
                    @else
                    <span class="text-muted fs-12 lead">- No Preview Available -</span>
                    @endif
                </td>
            </tr>
            <tr class="text-center">
                <td class="theme-1">{{$count++}}</td>
                <td class="theme-1 text-start">
                    <p class="m-0 fs-12 fw-600">Passed 10+2 Intermediate Exam In Any Recognized Board In India</p>
                    <p class="m-0 fs-12">( भारत में किसी भी मान्यता प्राप्त बोर्ड से 10+2 इंटरमीडिएट परीक्षा उत्तीर्ण)
                    </p>
                    <small class="mt-auto mx-auto fs-10 text-danger fw-500">MIN: 10 KB, MAX: 300KB | FORMAT:.pdf</small>
                </td>
                <td class="theme-1">
                    <label for="uploadXII" class="btn p-0 py-1 px-3 fs-12 fw-500 rounded-0 my-1 my-md-0 btn-primary"><i
                            class="bi bi-cloud-arrow-up"></i> UPLOAD</label>
                    <input type="file" id="uploadXII" name="uploadXII" class="d-none upload_doc" data-id="upload_xii"
                        accept=".pdf">
                </td>
                <td class="theme-1">
                    @if(isset($candidate->uploadXII))
                    <span class="text-blue-500 font-medium hover:underline cursor-pointer"
                        style="height: 5rem!important;" onclick="enlargeDoc(this)">
                        <iframe src="/storage/{{$candidate->uploadXII}}" width="100%" height="100" class="bg-gray-100"
                            title="uploadXII" scrolling="no" allowfullscreen></iframe><br>
                        <span class="enlarge_btn"><i class="bi bi-arrows-fullscreen"></i> Enlarge</span>
                    </span>
                    @else
                    <span class="text-muted fs-12 lead">- No Preview Available -</span>
                    @endif
                </td>
            </tr>

            @endif
            <tr class="text-center">
                <td class="theme-1">{{$count++}}</td>
                <td class="theme-1 text-start">
                    <p class="m-0 fs-12 fw-600">ID Proof Certificate (@foreach (config('globalVar.id_option') as
                        $key=>$val) @if($candidate->id_option == $key) {{$val}} @endif @endforeach)</p>
                    <p class="m-0 fs-12">( आईडी प्रूफ प्रमाणपत्र )</p>
                    <small class="mt-auto mx-auto fs-10 text-danger fw-500">MIN: 10 KB,MAX: 300KB | FORMAT:.pdf</small>
                </td>
                <td class="theme-1">
                    <label for="id_proof" class="btn p-0 py-1 px-3 fs-12 fw-500 rounded-0 my-1 my-md-0 btn-primary"><i
                            class="bi bi-cloud-arrow-up"></i> UPLOAD</label>
                    <input type="file" id="id_proof" name="id_proof" class="d-none upload_doc" data-id="id_proof"
                        accept=".pdf">
                </td>
                <td class="theme-1">
                    @if(isset($candidate->id_proofCert))
                    <span class="text-blue-500 font-medium hover:underline cursor-pointer"
                        style="height: 5rem!important;" onclick="enlargeDoc(this)">
                        <iframe src="/storage/{{$candidate->id_proofCert}}" width="100%" height="100"
                            class="bg-gray-100" title="id_proofCert" scrolling="no" allowfullscreen></iframe><br>
                        <span class="enlarge_btn"><i class="bi bi-arrows-fullscreen"></i> Enlarge</span>
                    </span>
                    @else
                    <span class="text-muted fs-12 lead">- No Preview Available -</span>
                    @endif
                </td>
            </tr>
            @if($candidate->category > 2)
            <tr class="text-center">
                <td class="theme-1">{{$count++}}</td>
                <td class="theme-1 text-start">
                    <p class="m-0 fs-12 fw-600">Category Certificate ({{$candidate->c_category->name}})</p>
                    <p class="m-0 fs-12">( श्रेणी प्रमाणपत्र )</p>
                    <small class="mt-auto mx-auto fs-10 text-danger fw-500">MIN: 10 KB,MAX: 300KB | FORMAT:.pdf</small>
                </td>
                <td class="theme-1">
                    <label for="category" class="btn p-0 py-1 px-3 fs-12 fw-500 rounded-0 my-1 my-md-0 btn-primary"><i
                            class="bi bi-cloud-arrow-up"></i> UPLOAD</label>
                    <input type="file" id="category" name="category" class="d-none upload_doc" data-id="category"
                        accept=".pdf">
                </td>
                <td class="theme-1">
                    @if(isset($candidate->categoryCert))
                    <span class="text-blue-500 font-medium hover:underline cursor-pointer"
                        style="height: 5rem!important;" onclick="enlargeDoc(this)">
                        <iframe src="/storage/{{$candidate->categoryCert}}" width="100%" height="100"
                            class="bg-gray-100" title="categoryCert" scrolling="no" allowfullscreen></iframe><br>
                        <span class="enlarge_btn"><i class="bi bi-arrows-fullscreen"></i> Enlarge</span>
                    </span>
                    @else
                    <span class="text-muted fs-12 lead">- No Preview Available -</span>
                    @endif
                </td>
            </tr>
            @endif

            @if(in_array($candidate->computer_option, [1, 2,3,4,5,6]))
            <tr class="text-center">
                <td class="theme-1">{{$count++}}</td>
                <td class="theme-1 text-start">
                    <p class="m-0 fs-12 fw-600">Computer Certificate (@foreach (config('globalVar.computer_option') as
                        $key=>$val)
                        @if($candidate->computer_option == $key) {{$val}} ({{$candidate->computer_cert_name}}) @endif @endforeach)</p>
                    <p class="m-0 fs-12">( कंप्यूटर प्रमाणपत्र? )</p>
                    <small class="mt-auto mx-auto fs-10 text-danger fw-500">MIN: 10 KB,MAX: 300KB | FORMAT:.pdf</small>
                </td>


                <td class="theme-1">
                    <label for="computer" class="btn p-0 py-1 px-3 fs-12 fw-500 rounded-0 my-1 my-md-0 btn-primary"><i
                            class="bi bi-cloud-arrow-up"></i> UPLOAD</label>
                    <input type="file" id="computer" name="computer" class="d-none upload_doc" data-id="computer"
                        accept=".pdf">
                </td>
                <td class="theme-1">
                    @if(isset($candidate->computerCert))
                    <span class="text-blue-500 font-medium hover:underline cursor-pointer"
                        style="height: 5rem!important;" onclick="enlargeDoc(this)">
                        <iframe src="/storage/{{$candidate->computerCert}}" width="100%" height="100"
                            class="bg-gray-100" title="computerCert" scrolling="no" allowfullscreen></iframe><br>
                        <span class="enlarge_btn"><i class="bi bi-arrows-fullscreen"></i> Enlarge</span>
                    </span>
                    @else
                    <span class="text-muted fs-12 lead">- No Preview Available -</span>
                    @endif
                </td>

            </tr>
            @endif

            @if(in_array($candidate->dl_option, [1, 2]))
            <tr class="text-center">
                <td class="theme-1">{{$count++}}</td>
                <td class="theme-1 text-start">
                    <p class="m-0 fs-12 fw-600">Driving License (@foreach (config('globalVar.dl_option') as
                        $key=>$val)
                        @if($candidate->dl_option == $key) {{$val}} @endif @endforeach)</p>
                    <p class="m-0 fs-12">( ड्राइविंग लाइसेंस )</p>
                    <small class="mt-auto mx-auto fs-10 text-danger fw-500">MIN: 10 KB,MAX: 300KB | FORMAT:.pdf</small>
                </td>
                <td class="theme-1">
                    <label for="dl" class="btn p-0 py-1 px-3 fs-12 fw-500 rounded-0 my-1 my-md-0 btn-primary"><i
                            class="bi bi-cloud-arrow-up"></i> UPLOAD</label>
                    <input type="file" id="dl" name="dl" class="d-none upload_doc" data-id="dl" accept=".pdf">
                </td>
                <td class="theme-1">
                    @if(isset($candidate->dlCert))
                    <span class="text-blue-500 font-medium hover:underline cursor-pointer"
                        style="height: 5rem!important;" onclick="enlargeDoc(this)">
                        <iframe src="/storage/{{$candidate->dlCert}}" width="100%" height="100" class="bg-gray-100"
                            title="dlCert" scrolling="no" allowfullscreen></iframe><br>
                        <span class="enlarge_btn"><i class="bi bi-arrows-fullscreen"></i> Enlarge</span>
                    </span>
                    @else
                    <span class="text-muted fs-12 lead">- No Preview Available -</span>
                    @endif
                </td>
            </tr>
            @endif

            @if($candidate->domicile_option == 1)
            <tr class="text-center">
                <td class="theme-1">{{$count++}}</td>
                <td class="theme-1 text-start">
                    <p class="m-0 fs-12 fw-600">Domicile Certificate of Bihar </p>
                    <p class="m-0 fs-12">( बिहार का निवास प्रमाण पत्र )</p>
                    <small class="mt-auto mx-auto fs-10 text-danger fw-500">MIN: 10 KB,MAX: 300KB | FORMAT:.pdf</small>
                </td>
                <td class="theme-1">
                    <label for="domicile" class="btn p-0 py-1 px-3 fs-12 fw-500 rounded-0 my-1 my-md-0 btn-primary"><i
                            class="bi bi-cloud-arrow-up"></i> UPLOAD</label>
                    <input type="file" id="domicile" name="domicile" class="d-none upload_doc" data-id="domicile"
                        accept=".pdf">
                </td>
                <td class="theme-1">
                    @if(isset($candidate->domicileCert))
                    <span class="text-blue-500 font-medium hover:underline cursor-pointer"
                        style="height: 5rem!important;" onclick="enlargeDoc(this)">
                        <iframe src="/storage/{{$candidate->domicileCert}}" width="100%" height="100"
                            class="bg-gray-100" title="domicileCert" scrolling="no" allowfullscreen></iframe><br>
                        <span class="enlarge_btn"><i class="bi bi-arrows-fullscreen"></i> Enlarge</span>
                    </span>
                    @else
                    <span class="text-muted fs-12 lead">- No Preview Available -</span>
                    @endif
                </td>
            </tr>
            @endif

            @if($candidate->govt_servent_option == 1)
            <tr class="text-center">
                <td class="theme-1">{{$count++}}</td>
                <td class="theme-1 text-start">
                    <p class="m-0 fs-12 fw-600">Government servant of Bihar Government and completed "3 years" of
                        continuous service Certificate</p>
                    <p class="m-0 fs-12">( बिहार सरकार के सरकारी कर्मचारी और निरंतर सेवा प्रमाणपत्र के "3 वर्ष" पूरे कर लिए हैं )</p>
                    <small class="mt-auto mx-auto fs-10 text-danger fw-500">MIN: 10 KB,MAX: 300KB | FORMAT:.pdf</small>
                </td>
                <td class="theme-1">
                    <label for="govtServent"
                        class="btn p-0 py-1 px-3 fs-12 fw-500 rounded-0 my-1 my-md-0 btn-primary"><i
                            class="bi bi-cloud-arrow-up"></i> UPLOAD</label>
                    <input type="file" id="govtServent" name="govtServent" class="d-none upload_doc"
                        data-id="govtServent" accept=".pdf">
                </td>
                <td class="theme-1">
                    @if(isset($candidate->govtServentCert))
                    <span class="text-blue-500 font-medium hover:underline cursor-pointer"
                        style="height: 5rem!important;" onclick="enlargeDoc(this)">
                        <iframe src="/storage/{{$candidate->govtServentCert}}" width="100%" height="100"
                            class="bg-gray-100" title="govtServentCert" scrolling="no" allowfullscreen></iframe><br>
                        <span class="enlarge_btn"><i class="bi bi-arrows-fullscreen"></i> Enlarge</span>
                    </span>
                    @else
                    <span class="text-muted fs-12 lead">- No Preview Available -</span>
                    @endif
                </td>
            </tr>
            @endif

            @if($candidate->pwd_option == 1)
            <tr class="text-center">
                <td class="theme-1">{{$count++}}</td>
                <td class="theme-1 text-start">
                    <p class="m-0 fs-12 fw-600">Person with disability Certificate</p>
                    <p class="m-0 fs-12">( श्रेणी प्रमाणपत्र )</p>
                    <small class="mt-auto mx-auto fs-10 text-danger fw-500">MIN: 10 KB,MAX: 300KB | FORMAT:.pdf</small>
                </td>
                <td class="theme-1">
                    <label for="pwd" class="btn p-0 py-1 px-3 fs-12 fw-500 rounded-0 my-1 my-md-0 btn-primary"><i
                            class="bi bi-cloud-arrow-up"></i> UPLOAD</label>
                    <input type="file" id="pwd" name="pwd" class="d-none upload_doc" data-id="pwd" accept=".pdf">
                </td>
                <td class="theme-1">
                    @if(isset($candidate->pwdCert))
                    <span class="text-blue-500 font-medium hover:underline cursor-pointer"
                        style="height: 5rem!important;" onclick="enlargeDoc(this)">
                        <iframe src="/storage/{{$candidate->pwdCert}}" width="100%" height="100" class="bg-gray-100"
                            title="pwdCert" scrolling="no" allowfullscreen></iframe><br>
                        <span class="enlarge_btn"><i class="bi bi-arrows-fullscreen"></i> Enlarge</span>
                    </span>
                    @else
                    <span class="text-muted fs-12 lead">- No Preview Available -</span>
                    @endif
                </td>
            </tr>
            @endif

            @if($candidate->ex_ser_option == 1)
            <tr class="text-center">
                <td class="theme-1">{{$count++}}</td>
                <td class="theme-1 text-start">
                    <p class="m-0 fs-12 fw-600">Ex-servicemen of defence service Certificate</p>
                    <p class="m-0 fs-12">( श्रेणी प्रमाणपत्र )</p>
                    <small class="mt-auto mx-auto fs-10 text-danger fw-500">MIN: 10 KB,MAX: 300KB | FORMAT:.pdf</small>
                </td>
                <td class="theme-1">
                    <label for="exSer" class="btn p-0 py-1 px-3 fs-12 fw-500 rounded-0 my-1 my-md-0 btn-primary"><i
                            class="bi bi-cloud-arrow-up"></i> UPLOAD</label>
                    <input type="file" id="exSer" name="exSer" class="d-none upload_doc" data-id="exSer" accept=".pdf">
                </td>
                <td class="theme-1">
                    @if(isset($candidate->exSerCert))
                    <span class="text-blue-500 font-medium hover:underline cursor-pointer"
                        style="height: 5rem!important;" onclick="enlargeDoc(this)">
                        <iframe src="/storage/{{$candidate->exSerCert}}" width="100%" height="100" class="bg-gray-100"
                            title="exSerCert" scrolling="no" allowfullscreen></iframe><br>
                        <span class="enlarge_btn"><i class="bi bi-arrows-fullscreen"></i> Enlarge</span>
                    </span>
                    @else
                    <span class="text-muted fs-12 lead">- No Preview Available -</span>
                    @endif
                </td>
            </tr>
            @endif
        </table>
    </div>
</form>

<div class="d-flex justify-content-between">
    <a class="btn btn-secondary mx-1" href="/home"><i class="bi bi-arrow-left-short pe-1"></i>Back</a>
    <a class="btn btn-success px-4 @if(!$response) disabled-class @endif"
        href="/home">Apply<i
            class="bi bi-chevron-bar-down ps-1"></i></a>
</div>

<div class="close-modal" id="photoModal">
    <div class="" id="photoModalContent">
        <button type="button" class="" id="photoModalClose" onclick="hideModal();">
            <i class="bi bi-x-lg"></i>
        </button>
        <div class="modalCon">
            <iframe src="" frameborder="0" class="" id="photoModalFrame" scrolling="no" allowfullscreen></iframe>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
  $('iframe').on("load", function () {
        $(this).contents().find('img').css({width: '100%', 'height': '100%', 'object-position': 'center', 'object-fit': 'contain'});
      });

        const phmodal = document.getElementById('photoModal');
        function showModal () {
            $(phmodal).removeClass('close-modal');
            $('body').css('overflow', 'hidden');
        }
        function hideModal () {
            $(phmodal).addClass('close-modal');
            $('body').css('overflow', 'auto');
        }
        function enlargeDoc(elm) {
            var src = $(elm).find('iframe').attr('src');
            $('#photoModalFrame').prop('src', src)
            showModal();
        }
    function uploadFile(input, type) {
        var fileInput = $(input);
        var ftp = type;
        if (ftp == 1 || ftp == 2) {

            var maxSize = 100 * 1024; //5 * 1024 * 1024; // 5 MB (you can adjust the size as needed)
            var minSize = 10 * 1024;
            var validExtensions = ['jpg', 'jpeg'];
            var msg = "File size should be between 10 kb and 100 kb"
        } else

        {
            //if (ftp == 3 || ftp == 4 || ftp == 5 || ftp == 6 || ftp == 7) {

            var maxSize = 300 * 1024; //5 * 1024 * 1024; // 5 MB (you can adjust the size as needed)
            var minSize = 10 * 1024;
            var validExtensions = ['pdf'];
            var msg = "File size should be between 10 kb and 300 kb";
        }

        var file = fileInput[0].files[0];
        if (file) {
            if (file.size > maxSize) {
                alert(msg);
                fileInput.val('');
                return;
            }
            if (file.size < minSize) {
                alert(msg);
                fileInput.val('');
                return;
            }

            // Check file extension
            var fileName = file.name;
            var fileExtension = fileName.split('.').pop().toLowerCase();
            // console.log(fileExtension);

            if (!validExtensions || $.inArray(fileExtension, validExtensions) === -1) {
                alert('Invalid file extension. Please choose a valid file with extensions jpg or jpeg');
                fileInput.val('');
                return;
            }

            var form = $('#candidateForm');
            var formData = new FormData(form[0]);
            formData.append('upload_doc', file);
            formData.append('upload_type', ftp);
            actionUrl = "/save-candidate-upload-data";
            $('.pageloader').fadeIn();
            $.ajax({
                type: 'POST',
                url: actionUrl,
                data: formData,
                contentType: false,
                enctype: 'multipart/form-data',
                cache: false,
                processData: false,
                dataType: 'json',

                success: function (data) {
                    $('.pageloader').fadeOut();


                    var msg = ajaxErrorMsg(data);
                    swal.fire({
                        icon: 'success',
                        "html": msg,
                        "type": "success",
                        "confirmButtonClass": "btn btn-success"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    })
                },
                error: function (data) {
                    $(".pageloader").fadeOut();

                    var msg = ajaxErrorMsg(data);
                    swal.fire({
                        "title": 'Sorry!',
                        "html": msg,
                        "type": "error",
                        "confirmButtonClass": "btn btn-danger"
                    });

                },
            });

        } else {
            alert('Please select a file.');
        }
    }
    $(document).ready(function () {
        $('.upload_doc').change(function () {
            var elm = $(this);
            var response = 0;
            var uploadType = elm.attr('data-id');
            // alert(uploadType);
            if (uploadType == "photo") {
                var type = 1;


            } else if (uploadType == "sign") {
                var type = 2;


            } else if (uploadType == "uploadX") {
                var type = 3;


            } else if (uploadType == "upload_xii") {
                var type = 4;


            } else if (uploadType == "uploadGrad") {
                var type = 7;



            } else if (uploadType == "uploadPostGrad") {
                var type = 14;


            } else if (uploadType == "category") {
                var type = 5;


            } else if (uploadType == "id_proof") {
                var type = 6;


            }
            else if (uploadType == "computer") {
                var type = 8;


            }
            else if (uploadType == "dl") {
                var type = 9;


            }
            else if (uploadType == "domicile") {
                var type = 10;


            }
            else if (uploadType == "govtServent") {
                var type = 11;


            }
            else if (uploadType == "pwd") {
                var type = 12;


            }
            else if (uploadType == "exSer") {
                var type = 13;


            }
            // alert(type);
            response = uploadFile(this, type);


        });


    });



</script>
@endsection
