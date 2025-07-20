@props(['id', 'label', 'name', 'required' => true])

<div class="form-group row">
  <label for="{{ $id }}" class="col-md-4 col-form-label text-md-right">{{ $label }}</label>
  <div class="col-md-6 position-relative">
    <input 
      id="{{ $id }}" 
      type="password" 
      name="{{ $name }}" 
      {{ $required ? 'required' : '' }} 
      {{ $attributes->merge(['class' => 'form-control']) }} 
      autocomplete="new-password"
    >
    <button 
      type="button" 
      class="btn btn-sm btn-outline-secondary position-absolute" 
      style="top: 50%; right: 10px; transform: translateY(-50%)"
      onclick="togglePasswordVisibility('{{ $id }}', this)"
      aria-label="Show or hide password"
    >
      👁️
    </button>
  </div>
</div>
