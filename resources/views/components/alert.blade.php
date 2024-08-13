<div {{ $attributes->class([
    "mb-2 alert mb-0 rounded-0 text-center small py-2"
])->merge([
    'class' => ($type === 'warning' ? "alert-warning" : ($type === 'success' ? 'alert-success' : 'alert-info') )
]) }}>
    {{ $slot }}
</div>