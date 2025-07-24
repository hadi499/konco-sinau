@extends('layouts')

@section('content')
<div class="flex justify-center items-center min-h-screen ">
  <div class="bg-white shadow-lg rounded-2xl p-6 w-full max-w-6xl">
    <h1 class="text-2xl font-bold text-center text-gray-700 mb-4">
      Rumus Tenses Bahasa Inggris
    </h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
      <!-- 1. Simple Present Tense -->
      <div class="bg-gray-50 p-4 rounded-lg shadow">
        <h2 class="font-bold text-lg mb-2 text-gray-600">1. Simple Present Tense</h2>
        <ul class="space-y-1 text-gray-700">
          <li class="font-semibold text-blue-600">Untuk subject I, You, They</li>
          <li>+ Subject + Verb 1</li>
          <li>- Subject + do not + Verb 1</li>
          <li>? do + Subject + Verb 1</li>
          <li class="font-semibold text-blue-600 mt-2">Untuk subject She, He, It</li>
          <li>+ Subject + Verb 1 (s/es)</li>
          <li>- Subject + does not + Verb 1</li>
          <li>? does + Subject + Verb 1</li>
        </ul>
      </div>

      <!-- 2. Simple Past Tense -->
      <div class="bg-gray-50 p-4 rounded-lg shadow">
        <h2 class="font-bold text-lg mb-2 text-gray-600">2. Simple Past Tense</h2>
        <ul class="space-y-1 text-gray-700">
          <li>+ Subject + Verb 2</li>
          <li>- Subject + did not + Verb 1</li>
          <li>? did + Subject + Verb 1</li>
        </ul>
      </div>

      <!-- 3. Present Continuous Tense -->
      <div class="bg-gray-50 p-4 rounded-lg shadow">
        <h2 class="font-bold text-lg mb-2 text-gray-600">3. Present Continuous Tense</h2>
        <ul class="space-y-1 text-gray-700">
          <li>+ Subject + to be + Verb 1 ing</li>
          <li>- Subject + to be not + Verb 1 ing</li>
          <li>? to be + Subject + Verb 1 ing</li>
        </ul>
      </div>

      <!-- 4. Present Perfect Tense -->
      <div class="bg-gray-50 p-4 rounded-lg shadow">
        <h2 class="font-bold text-lg mb-2 text-gray-600">4. Present Perfect Tense</h2>
        <ul class="space-y-1 text-gray-700">
          <li class="font-semibold text-blue-600">Untuk subject I, You, They</li>
          <li>+ Subject + have + Verb 3</li>
          <li>- Subject + have not + Verb 3</li>
          <li>? have + Subject + Verb 3</li>
          <li class="font-semibold text-blue-600 mt-2">Untuk subject She, He, It</li>
          <li>+ Subject + has + Verb 3</li>
          <li>- Subject + has not + Verb 3</li>
          <li>? has + Subject + Verb 3</li>
        </ul>
      </div>

      <!-- 5. Simple Future Tense -->
      <div class="bg-gray-50 p-4 rounded-lg shadow">
        <h2 class="font-bold text-lg mb-2 text-gray-600">5. Simple Future Tense</h2>
        <ul class="space-y-1 text-gray-700">
          <li>+ Subject + will + Verb 1</li>
          <li>- Subject + will not + Verb 1</li>
          <li>? will + Subject + Verb 1</li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
