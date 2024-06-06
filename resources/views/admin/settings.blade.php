<!-- music_management/categories.blade.php -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Include jQuery before Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- resources/views/admin/settings.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('INC Hymns Management System') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="d-flex flex-wrap">
                        <!-- List of Categories -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('categories.index') }}" class="settings_button">
                                            <i class="fas fa-tags fa-4x" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Categories</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">categories, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage categories</p>
                                </div>
                            </div>
                        </div>

                        <!-- List of Instrumentations -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('instrumentations.index') }}" class="settings_button">
                                            <i class="fas fa-music fa-4x" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Instrumentations</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">instrumentations, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage instrumentations</p>
                                </div>
                            </div>
                        </div>

                        <!-- List of Ensemble Types -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('ensemble_types.index') }}" class="settings_button">
                                        <i class="fas fa-microphone-alt fa-4x" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Ensemble Types</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">ensemble types, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage ensemble types</p>
                                </div>
                            </div>
                        </div>

                        <!-- List of Credits -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('credits.index') }}" class="settings_button">
                                            <i class="fas fa-credit-card fa-4x" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Credits</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">credits, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage credits</p>
                                </div>
                            </div>
                        </div>

                        <!-- List of Permissions -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('permissions.index') }}" class="settings_button">
                                            <i class="fas fa-shield-alt fa-4x" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Permissions</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">permissions, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage permissions</p>
                                </div>
                            </div>
                        </div>

                        
                        <!-- List of Users -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('users.index') }}" class="settings_button">
                                            <i class="fas fa-users fa-4x" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Users</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">users, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage users</p>
                                </div>
                            </div>
                        </div>


                        <!-- List of Groups -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('groups.index') }}" class="settings_button">
                                            <i class="fas fa-user-friends fa-4x" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">Groups</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">groups, management</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">Manage groups</p>
                                </div>
                            </div>
                        </div>

                        <!-- Add a new box for API Documentation below the Groups box -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="box box-default" style="border: 2px solid #bbb; margin: 10px;">
                                <div class="box-body text-center mt-4">
                                    <h5>
                                        <a href="{{ route('api_documentations.index') }}" class="settings_button">
                                            <i class="fas fa-book-open fa-4x" aria-hidden="true"></i>
                                            <br><br>
                                            <span class="name">API Documentation</span>
                                            <span class="keywords" aria-hidden="true" style="display:none">api, documentation</span>
                                        </a>
                                    </h5>
                                    <p class="help-block" style="display:none">View API documentation</p>
                                </div>
                            </div>
                        </div>




                    </div> <!-- end flex-wrap -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
