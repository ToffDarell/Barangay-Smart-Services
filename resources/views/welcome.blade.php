<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Norte Poblacion</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .bg-pattern {
            background-image: linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 30px 30px;
        }
    </style>
</head>
<body class="bg-[#2E2854] text-white bg-pattern overflow-x-hidden">
    <!-- Navbar -->
    <nav class="container mx-auto px-6 py-6 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <div class="bg-white rounded-full p-2">
                <svg class="w-6 h-6 text-purple-700" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L3 7v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-9-5z"/></svg>
            </div>
            <span class="text-xl font-bold tracking-tight">Barangay Norte Poblacion</span>
        </div>
        <div class="hidden md:flex items-center gap-8 text-sm font-medium">
            <a href="#" class="border-b-2 border-white pb-1">Services</a>
            <a href="#" class="text-gray-300 hover:text-white transition">Announcements</a>
            <a href="#" class="text-gray-300 hover:text-white transition">Transparency</a>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('login') }}" class="text-sm font-medium hover:text-gray-200 transition">Login</a>
            <a href="#" class="bg-[#7c3aed] hover:bg-[#6d28d9] transition px-5 py-2.5 rounded-md text-sm font-semibold shadow-lg shadow-purple-900/50">Request Documents</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container mx-auto px-6 pt-20 pb-32 grid lg:grid-cols-2 gap-12 items-center relative">
        <!-- Text Content -->
        <div class="z-10">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 text-xs font-semibold mb-6">
                <span class="w-2 h-2 rounded-full bg-purple-400"></span> OFFICIAL DIGITAL SERVICES
            </span>
            <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-6">
                Smart Services for<br>
                <span class="text-[#c4b5fd]">Barangay Norte<br>Poblacion</span><br>
                Residents
            </h1>
            <p class="text-gray-300 text-lg mb-10 max-w-lg leading-relaxed">
                Request certificates, stay informed, and connect with your community anytime, anywhere. A modern approach to local governance.
            </p>
            <div class="flex items-center gap-4">
                <a href="#" class="bg-[#7c3aed] hover:bg-[#6d28d9] transition px-6 py-3 rounded-md text-sm font-semibold flex items-center gap-2 shadow-lg shadow-purple-900/50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Request Documents
                </a>
                <a href="#" class="bg-white/10 hover:bg-white/20 border border-white/20 transition px-6 py-3 rounded-md text-sm font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                    View Announcements
                </a>
            </div>
        </div>

        <!-- Illustration -->
        <div class="relative z-10 flex justify-center">
            <div class="absolute inset-0 bg-[#7c3aed]/30 blur-[100px] rounded-full"></div>
            <div class="bg-white rounded-2xl p-8 shadow-2xl shadow-purple-900/50 rotate-[-5deg] relative z-10 max-w-sm w-full transform hover:rotate-0 transition duration-500">
                <div class="flex justify-center mb-6">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
                    </div>
                </div>
                <div class="text-center mb-6">
                    <p class="text-[10px] text-gray-500 font-bold tracking-widest uppercase">Barangay Norte Poblacion</p>
                    <p class="text-[8px] text-gray-400 mb-2">CITY OF SAMPLE, PHILIPPINES</p>
                    <h3 class="text-gray-900 font-bold text-lg">CERTIFICATE OF RESIDENCY</h3>
                </div>
                <div class="space-y-3">
                    <div class="h-2 bg-gray-100 rounded w-full"></div>
                    <div class="h-2 bg-gray-100 rounded w-5/6"></div>
                    <div class="h-2 bg-gray-100 rounded w-4/6"></div>
                </div>
                <div class="mt-8 flex justify-end">
                    <div class="w-24 h-1 bg-gray-200 rounded"></div>
                </div>
                
                <!-- Badge -->
                <div class="absolute -bottom-4 -right-4 bg-[#7c3aed] text-white p-3 rounded-full shadow-lg shadow-purple-500/50">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Bar -->
    <div class="container mx-auto px-6 relative z-20 -mt-16">
        <div class="bg-[#3B3468]/80 backdrop-blur-md border border-white/10 rounded-2xl p-8 grid grid-cols-2 md:grid-cols-5 gap-8 items-center">
            <div class="flex items-center gap-4 col-span-2 md:col-span-1">
                <div class="w-12 h-12 bg-white/10 rounded-lg flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div>
                    <p class="font-bold text-sm">Our Community</p>
                    <p class="text-xs text-gray-400">Stronger Together</p>
                </div>
            </div>
            <div class="text-center md:border-l border-white/10">
                <div class="flex justify-center mb-1 text-purple-300"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg></div>
                <p class="text-2xl font-bold">2,500+</p>
                <p class="text-[10px] text-gray-400 font-semibold tracking-wider">ACTIVE RESIDENTS</p>
            </div>
            <div class="text-center md:border-l border-white/10">
                <div class="flex justify-center mb-1 text-purple-300"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg></div>
                <p class="text-2xl font-bold">6+</p>
                <p class="text-[10px] text-gray-400 font-semibold tracking-wider">SERVICES ONLINE</p>
            </div>
            <div class="text-center md:border-l border-white/10">
                <div class="flex justify-center mb-1 text-purple-300"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg></div>
                <p class="text-2xl font-bold">100%</p>
                <p class="text-[10px] text-gray-400 font-semibold tracking-wider">TRANSPARENT</p>
            </div>
            <div class="text-center md:border-l border-white/10">
                <div class="flex justify-center mb-1 text-purple-300"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                <p class="text-2xl font-bold">24/7</p>
                <p class="text-[10px] text-gray-400 font-semibold tracking-wider">ACCESSIBILITY</p>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="bg-white text-gray-900 pt-32 pb-24 mt-10">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl font-bold mb-4">Available E-Services</h2>
                <p class="text-gray-500">Fast, secure, and convenient access to essential barangay documents. Request online and track your application status.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-[#faf5ff] border border-purple-100 rounded-2xl p-8 hover:shadow-lg hover:border-purple-200 transition duration-300 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/40 rounded-full blur-2xl -mr-10 -mt-10"></div>
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-sm mb-6 text-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg mb-2 relative z-10">Barangay Clearance</h3>
                    <p class="text-gray-500 text-sm mb-6 line-clamp-2 relative z-10">Official document certifying that the resident has no derogatory record within the barangay jurisdiction.</p>
                    <a href="#" class="text-purple-600 font-semibold text-sm flex items-center gap-1 hover:text-purple-700 relative z-10">Request Now <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
                </div>

                <!-- Card 2 -->
                <div class="bg-[#faf5ff] border border-purple-100 rounded-2xl p-8 hover:shadow-lg hover:border-purple-200 transition duration-300 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/40 rounded-full blur-2xl -mr-10 -mt-10"></div>
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-sm mb-6 text-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg mb-2 relative z-10">Certificate of Residency</h3>
                    <p class="text-gray-500 text-sm mb-6 line-clamp-2 relative z-10">Proof of current address and residency within the barangay for various legal and administrative purposes.</p>
                    <a href="#" class="text-purple-600 font-semibold text-sm flex items-center gap-1 hover:text-purple-700 relative z-10">Request Now <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
                </div>

                <!-- Card 3 -->
                <div class="bg-[#faf5ff] border border-purple-100 rounded-2xl p-8 hover:shadow-lg hover:border-purple-200 transition duration-300 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/40 rounded-full blur-2xl -mr-10 -mt-10"></div>
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-sm mb-6 text-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg mb-2 relative z-10">Certificate of Indigency</h3>
                    <p class="text-gray-500 text-sm mb-6 line-clamp-2 relative z-10">Certification for low-income residents required for medical, educational, or financial assistance programs.</p>
                    <a href="#" class="text-purple-600 font-semibold text-sm flex items-center gap-1 hover:text-purple-700 relative z-10">Request Now <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
                </div>

                <!-- Card 4 -->
                <div class="bg-[#faf5ff] border border-purple-100 rounded-2xl p-8 hover:shadow-lg hover:border-purple-200 transition duration-300 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/40 rounded-full blur-2xl -mr-10 -mt-10"></div>
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-sm mb-6 text-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg mb-2 relative z-10">Barangay ID</h3>
                    <p class="text-gray-500 text-sm mb-6 line-clamp-2 relative z-10">Official identification card issued to registered residents for local transactions and verification.</p>
                    <a href="#" class="text-purple-600 font-semibold text-sm flex items-center gap-1 hover:text-purple-700 relative z-10">Request Now <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
                </div>

                <!-- Card 5 -->
                <div class="bg-[#faf5ff] border border-purple-100 rounded-2xl p-8 hover:shadow-lg hover:border-purple-200 transition duration-300 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/40 rounded-full blur-2xl -mr-10 -mt-10"></div>
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-sm mb-6 text-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg mb-2 relative z-10">First Time Job Seeker</h3>
                    <p class="text-gray-500 text-sm mb-6 line-clamp-2 relative z-10">Special certification granting fee exemptions for first-time job applicants under RA 11261.</p>
                    <a href="#" class="text-purple-600 font-semibold text-sm flex items-center gap-1 hover:text-purple-700 relative z-10">Request Now <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
                </div>

                <!-- Card 6 -->
                <div class="bg-[#faf5ff] border border-purple-100 rounded-2xl p-8 hover:shadow-lg hover:border-purple-200 transition duration-300 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/40 rounded-full blur-2xl -mr-10 -mt-10"></div>
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-sm mb-6 text-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg mb-2 relative z-10">Business Clearance</h3>
                    <p class="text-gray-500 text-sm mb-6 line-clamp-2 relative z-10">Prerequisite clearance for securing a Mayor's Permit to operate a business within the barangay.</p>
                    <a href="#" class="text-purple-600 font-semibold text-sm flex items-center gap-1 hover:text-purple-700 relative z-10">Request Now <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
