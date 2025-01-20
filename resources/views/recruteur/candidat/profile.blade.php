<div class="row">
    <div class="col-md-4">
        <!-- Trigger the modal with the image -->

        <div class="card">
            @if (!empty($candidature->photo) && Storage::disk('public')->exists($candidature->photo))
                <img src="{{ asset('storage/' . $candidature->photo) }}" class="card-img-top image-preview" alt="Employee Image" data-bs-toggle="modal" data-bs-target="#imageModal">
                
                @if (Auth::user()->hasRole('chercheur'))
                    <div class="card-body">
                        <div class="card-text">
                            <!-- Button to delete the image -->
                            <button class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">{{ __("messages.Delete") }}</button>
                            <form id="delete-form" action="#" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                @endif
            @else
                <img src="{{ asset('storage/' . $candidature->user->avatar) }}" class="card-img-top image-preview" alt="Default User Image" data-bs-toggle="modal" data-bs-target="#imageModal">
                <div class="card-body">
                    <!-- <h5 class="card-title">{{ __("messages.NoImage") }}</h5> -->
                    <div class="card-text">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <!-- <label for="imageUpload" class="form-label">{{ __("messages.UploadImage") }}</label> -->
                                <input type="file" class="form-control" name="image" id="imageUpload" required>
                                <button type="submit" class="btn btn-success btn-sm mt-2">{{ __("Charger") }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>


        <style>
            .image-preview {
                border-radius: 2px;
                cursor: pointer;
            }
        </style>



    </div>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">
                        {{ $candidat->user->first_name }}{{ $candidat->user->last_name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(!empty($candidature->photo) && Storage::disk('public')->exists($candidature->photo)) 
                        <img src="{{ asset('storage/'. $candidature->photo) }}" class="card-img-top image-preview" alt="Employee Image">
                    @else
                        <img src="{{ asset('storage/uploads/profil/user.png') }}" class="img-fluid" alt="Photo">
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <ul class="list-group">
            @if (Auth::user()->hasRole('chercheur') && $candidat->deleted_at != null)
                <li class="list-group-item bg-danger">
                    <span class="icon"><i class="bi bi-person-fill"></i></span>
                    <span class="info"><strong>{{ __("messages.Terminationdate") }} : </strong>
                        {{ $candidat->deleted_at }}</span>
                </li>
            @endif

            <li class="list-group-item">
                <span class="icon"><i class="bi bi-person-fill"></i></span>
                <span class="info"><strong>Nom de famille : </strong> {{ $candidat->user->last_name }}</span>
            </li>

            <li class="list-group-item">
                <span class="icon"><i class="bi bi-person-fill"></i></span>
                <span class="info"><strong>Prénom(s) : </strong>
                    {{ $candidat->user->first_name }}</span>
            </li>

            <script>
                // Get the date of birth from the server
                var dob = new Date("{{ $candidat->date_of_birth }}");

                // Calculate the age
                var ageDiff = Date.now() - dob.getTime();
                var ageDate = new Date(ageDiff);
                var calculatedAge = Math.abs(ageDate.getUTCFullYear() - 1970);

                // Display the age
                document.getElementById("age").innerText = calculatedAge + " years old";
            </script>

            @if(!empty($candidature))
                @if($candidature->project->categorie == 'P')
                    <li class="list-group-item">
                        <span class="icon"><i class="bi bi-cash"></i></span>
                        <span class="info"><strong>Prix : </strong>
                            {{ $candidature->prix }}</span>
                    </li>
                    <li class="list-group-item">
                        <span class="icon"><i class="bi bi-cash"></i></span>
                        <span class="info"><strong>Durée en jour(s) : </strong>
                            {{ $candidature->duree }}</span>
                    </li>
                @endif
                
                <li class="list-group-item">
                    <span class="icon"><i class="bi bi-cash"></i></span>
                    <span class="info"><strong>Message:</strong> {{ $candidature->messagedif }}</span>
                </li>

            @endif
            
            <li class="list-group-item">
                <span class="icon"><i class="bi bi-file-earmark-text"></i></span>
                <span class="info"><strong>Date de candidature : </strong>
                    {{ \Carbon\Carbon::parse($candidature->created_at)->format('d/m/Y H:i:s') }}
                </span>
                <span class="date-details float-end" id="created-date-details"
                    style="font-family: 'Courier New', Courier, monospace ; color: #9b9b9b"></span>
            </li>

            <li class="list-group-item">
                <span class="icon"><i class="bi bi-file-earmark-text"></i></span>
                <span class="info"><strong>Date de modification : </strong>
                    {{ \Carbon\Carbon::parse($candidature->updated_at)->format('d/m/Y H:i:s') }}
                </span>
                <span class="date-details float-end" id="updated-date-details"
                    style="font-family: 'Courier New', Courier, monospace ; color: #9b9b9b"></span>
            </li>

            <li class="list-group-item">
                <span class="icon"><i class="bi bi-file-earmark-text"></i></span>
                <span class="info"><strong>A propos :</strong>
                    {{ $candidat->about }}
                </span>
            </li>

            <li class="list-group-item">
                <span class="icon"><i class="bi bi-file-earmark-text"></i></span>
                <span class="info"><strong>Disponible ? :</strong> 
                     {{ $candidat->vacant }}
                </span>
            </li>
            
            <li class="list-group-item">
                <span class="icon"><i class="bi bi-file-earmark-text"></i></span>
                <span class="info"><strong>Pays de résidence : </strong>
                    {{ $candidat->country->namecountry }}
                </span>
            </li>

            <li class="list-group-item">
                <span class="icon"><i class="bi bi-file-earmark-text"></i></span>
                <span class="info"><strong>Numéro de téléphone : </strong>
                    {{ $candidat->tel }}
                </span>
            </li>

            <li class="list-group-item">
                <span class="icon"><i class="bi bi-calendar-check"></i></span>
                <span class="info"><strong>Domaine(s) d'intervention : </strong>
                    @foreach($userinfos_skills as $skill)
                    <span class="text-red">{{ $skill->skill->name }} , </span>
                    @endforeach
                </span>
                    
            </li>
            <li class="list-group-item">
                <span class="icon"><i class="bi bi-calendar-check"></i></span>
                <span class="info"><strong>Langue(s) officielle(s) :</strong>
                    @foreach($userinfos_langues as $langue)
                        <span class="text-blue">{{ $langue->language->name }} =>  {{ $langue->level_oral }} , {{ $langue->level_written }}</span> ; 
                    @endforeach
                </span>
            </li>

            <script>
                // Function to format date
                function formatDate(dateString, containerId) {
                    var date = new Date(dateString);
                    var day = date.toLocaleString('en', {
                        weekday: 'short'
                    });
                    var month = date.toLocaleString('en', {
                        month: 'short'
                    });
                    var year = date.getFullYear();

                    document.getElementById(containerId).innerText = day + '/' + month + '/' + year;
                }

                // Call the function to format dates
                formatDate("{{ $candidature->created_at }}", "created-date-details");
                formatDate("{{ $candidature->updated_at }}", "updated-date-details");
            </script>


        </ul>

    </div>
</div>
