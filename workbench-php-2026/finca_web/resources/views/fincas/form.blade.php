<div class="mb-3">
    <label>Nombre</label>
    <input type="text" name="nombre" value="{{ old('nombre', $finca->nombre ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Ubicación</label>
    <input type="text" name="ubicacion" value="{{ old('ubicacion', $finca->ubicacion ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Hectáreas Totales</label>
    <input type="number" step="0.01" name="hectareas_totales"
           value="{{ old('hectareas_totales', $finca->hectareas_totales ?? '') }}"
           class="form-control">
</div>

<div class="mb-3">
    <label>Descripción</label>
    <textarea name="descripcion" class="form-control">{{ old('descripcion', $finca->descripcion ?? '') }}</textarea>
</div>
