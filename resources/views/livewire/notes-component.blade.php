<div>
    

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                {{-- <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Greeva</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                                    <li class="breadcrumb-item active">Email Compose</li>
                                </ol> --}}
                                {{-- <button type="button" class="btn btn-outline-success waves-effect width-md float-right" data-toggle="modal" data-target="#modalvault" data-overlaySpeed="200" data-animation="fadein" style="margin-top: 6px;">New Note</button> --}}

                                <a href="{{ route('notes') }}" type="button" class="btn btn-outline-success waves-effect width-md float-right" wire:click="newNote()" data-overlaySpeed="200" data-animation="fadein" style="margin-top: 6px;">New Note</a>

                            </div>
                            <h4 class="page-title">Notes</h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

                <!-- Right Sidebar -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <!-- Left sidebar -->
                            <div class="inbox-leftbar">

                                {{-- <a href="email-inbox.html" class="btn btn-danger btn-block waves-effect waves-light">Inbox</a> --}}
                                <select id="paginate" name="paginate" class="form-control input-sm" wire:model="paginate">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <br>
                                <input type="search" wire:model="search" class="form-control input-sm" placeholder="Search Note">

                                <div class="mail-list mt-4">
                                    @foreach($allNotes as $note)

                                        <input type="hidden" id="{{ $note->id }}hi_des" value="{{ $note->description }}">

                                        {{-- <a type="button" onclick="editFunction('{{ $note->id }}')" class="list-group-item border-0" wire:click="getNote('{{ $note->id }}')"><i class="fas fa-trash-alt font-18 align-middle mr-2"></i><i class="mdi mdi-file-document-box font-18 align-middle mr-2"></i>{{ $note->title }}</a> --}}

                                        {{-- <i class="fas fa-trash-alt font-18 align-middle mr-2"></i> --}}
                                        <div class="row">
                                            <div class="col-10">
                                                <a type="button" onclick="editFunction('{{ $note->id }}')" class="list-group-item border-0" wire:click="getNote('{{ $note->id }}')"><i class="mdi mdi-file-document-box font-18 align-middle mr-2"></i>
                                                    <?php
                                                        $ti = strlen($note->title);
                                                        if ($ti <=15) {
                                                            $temp = $note->title;
                                                        } else {
                                                            $temp = Str::substr($note->title,0,15).".....";
                                                        }
                                                        
                                                        
                                                        echo $temp;
                                                    ?>
                                                </a>
                                            </div>
                                            <div class="col-2">
                                                <a type="button" class="list-group-item border-0" wire:click="deleteID('{{ $note->id }}')" data-toggle="modal" data-target="#modalDeleteComponent"><i class="fas fa-trash-alt" style="margin-top:5px; color: red;"></i></a>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>

                                {{ $allNotes->links() }}

                            </div>
                            <!-- End Left sidebar -->

                            <div class="inbox-rightbar">

                                <div class="row">
                                    <div class="col-6">
                                        @if(Session::has('message'))
                                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-3">
                                        @if($description!=$description2)
                                            <h5 class="alert alert-danger" role="alert">Not saved</h5>
                                        @endif
                                        {{-- {{ $description2 }} --}}
                                    </div>
                                    <div class="col-3">
                                        <a class="btn btn-outline-success waves-effect width-md float-right" wire:click="updateNote()" style="margin-top: 10px;">Save</a>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <form>
                                        @error('title')<p class="text-danger">The Title Field is Required</p>@enderror
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Title" wire:model="title" required>
                                        </div>

                                        <div class="form-group" wire:ignore>
                                            <textarea id="description" class="form-control" placeholder="Description"></textarea>
                                        </div>

                                        

                                    </form>
                                </div> <!-- end card-->

                                <div class="row">
                                    <div class="col-6">
                                        @if(Session::has('message'))
                                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-3">
                                        @if($description!=$description2)
                                            <h5 class="alert alert-danger" role="alert">Not saved</h5>
                                        @endif
                                        {{-- {{ $description2 }} --}}
                                    </div>
                                    <div class="col-3">
                                        <a class="btn btn-outline-success waves-effect width-md float-right" wire:click="updateNote()" style="margin-top: 10px;">Save</a>
                                    </div>
                                </div>
    
                            </div> 
                            <!-- end inbox-rightbar-->

                            <div class="clearfix"></div>
                        </div>

                    </div> <!-- end Col -->

                </div><!-- End row -->
                
            </div> <!-- container-fluid -->


            {{-- Add categories Table-------------------------------------------------------------------------------------------- --}}

        <!--==========================
      =  Modal window for Add categories   =
      ===========================-->
<div wire:ignore.self id="modalvault" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data" wire:submit.prevent="storeNote">
                @csrf
                <!--=====================================
                    MODAL HEADER
                ======================================-->  
                  <div class="modal-header" style="color: white">
                    <h4 class="modal-title">New Note</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                  </div>
                  <!--=====================================
                    MODAL BODY
                  ======================================-->
                  <div class="modal-body">
                    <div class="box-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- TAKING NAME  -->
                          <div class="form-group">          
                            <div class="input-group">             
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Title:</strong>
                                <input type="text" class="form-control input-lg" placeholder="Title" wire:model="newtitle" required>
                              </div>
                            </div>
                          </div>

                    </div>
                  </div>
                  <!--=====================================
                    MODAL FOOTER
                  ======================================-->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  </div>
            </form>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--====  End of module Modal window for Add categories  ====-->

<!--==========================
          =  Modal window for Delete    =
          ===========================-->
        <!-- sample modal content -->
        <div wire:ignore.self id="modalDeleteComponent" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                        <!--=====================================
                            MODAL HEADER
                        ======================================-->  
                          <div class="modal-header">
                            <h4 class="modal-title">Delete Note</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                          </div>
                          <!--=====================================
                            MODAL BODY
                          ======================================-->
                          <div class="modal-body">
                            <div class="box-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                 <div class="form-group" wire:ignore>          
                                    <div class="input-group">             
                                      <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h2 class="text-center" style="color:red;">Are you want to delete This Note?</h2>
                                      </div>
                                    </div>
                                  </div>
                                  
                              
                            </div>
                          </div>
                          <!--=====================================
                            MODAL FOOTER
                          ======================================-->
                          <div class="modal-footer">
                            <button type="button" wire:click.prevent="delete()" class="btn btn-success waves-effect waves-light">Confirm</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                          </div>
                    
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->



        
        @push('scripts')
        <script>
          $(document).ready(function() {
            $('#description').summernote({
                height: 400,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false,                 // set focus to editable area after initializing summernote
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('description', contents);
                    }
                }
            });


          });

          function editFunction(id) {
              var des = document.getElementById(id+"hi_des").value;
                // console.log(id);
                // console.log(des);

                $('#description').summernote({
                    // focus: true,
                    callbacks: {
                        onChange: function(contents, $editable) {
                            @this.set('description', contents);
                        }
                    }
                }).summernote('code', des);
            }
        </script>
        @endpush



</div>
