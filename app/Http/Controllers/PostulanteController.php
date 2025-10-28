<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Para generar nombres de archivo únicos
use ZipArchive;

use PDF; // Asegúrate de tener importada la clase PDF (usando dompdf o similar)

class PostulanteController extends Controller
{
    /**
     * NOTA: No olvides agregar los nuevos campos a la propiedad $fillable en tu modelo Postulante.php
     * Ejemplo: protected $fillable = ['apellidos_nombres', 'dni', ..., 'vacunado', 'numero_vacunas', ...];
     */

    /**
     * Listar todos los postulantes con paginación y estadísticas
     * (Sin cambios aquí, a menos que quieras mostrar nuevos datos en la lista)
     */
    public function index()
    {
        $postulantes = Postulante::orderBy('apellidos_nombres', 'asc')->get();

        // Totales globales
        $documentosCount = \App\Models\Documento::count();
        $postulacionesCount = \App\Models\Postulacion::count();

        // Totales por estado de postulantes
        $estadisticasEstados = [
            'nuevo' => Postulante::where('estado', 'nuevo')->count(),
            'evaluacion' => Postulante::where('estado', 'en evaluación')->count(),
            'aceptado' => Postulante::where('estado', 'aceptado')->count(),
            'rechazado' => Postulante::where('estado', 'rechazado')->count(),
            'repostulacion' => Postulante::where('estado', 're-postulación')->count(),
            'total' => Postulante::count(),
        ];

        return view('postulantes.index', compact(
            'postulantes',
            'documentosCount',
            'postulacionesCount',
            'estadisticasEstados'
        ));
    }

    /**
     * Formulario de creación
     * (Sin cambios aquí, pero la vista 'postulantes.create' necesitará todos los nuevos campos)
     */
    public function create()
    {
        return view('postulantes.create');
    }

    /**
     * Guardar nuevo postulante
     */
    public function store(Request $request)
    {
        // --- 1. VALIDACIÓN AMPLIADA ---
        $request->validate([
            // Campos originales
            'apellidos_nombres' => 'required|string|max:255',
            'dni' => 'required|string|max:15|unique:postulantes,dni',
            'email' => 'nullable|email',
            'telefono' => 'nullable|string|max:50',
            'direccion' => 'nullable|string|max:255',
            'estado' => 'required|in:nuevo,en evaluación,aceptado,rechazado,re-postulación',

            // Nuevos campos de Sí/No (booleanos)
            'vacunado' => 'nullable|boolean',
            'tiene_vehiculo' => 'nullable|boolean',
            'tiene_soat' => 'nullable|boolean',
            'tiene_licencia_l1' => 'nullable|boolean',
            'tiene_licencia_l4' => 'nullable|boolean',
            'tiene_licencia_l5' => 'nullable|boolean',
            'recibo_agua' => 'nullable|boolean',
            'certificado_estudios' => 'nullable|boolean',
            'certiadulto' => 'nullable|boolean',
            'multa_electoral' => 'nullable|boolean',
            'antecedentes_penales' => 'nullable|boolean',

            // Campos condicionales (solo se validan si su bandera es true)
            'numero_vacunas' => 'required_if:vacunado,1|nullable|integer|min:1',
            'tipo_vehiculo' => 'required_if:tiene_vehiculo,1|nullable|string|max:50',
            'numero_soat' => 'required_if:tiene_soat,1|nullable|string|max:20',
            'vigencia_licencia_l1' => 'required_if:tiene_licencia_l1,1|nullable|date',
            'vigencia_licencia_l4' => 'required_if:tiene_licencia_l4,1|nullable|date',
            'vigencia_licencia_l5' => 'required_if:tiene_licencia_l5,1|nullable|date',

            // Campos numéricos y de texto
            'estatura' => 'nullable|numeric|between:0.50,2.50',
            'peso' => 'nullable|numeric|between:20,300',
            'numero_hijos' => 'nullable|integer|min:0',
            'sexo' => 'nullable|in:Masculino,Femenino,Otro,No especifica',
            'estado_civil' => 'nullable|in:Soltero(a),Casado(a),Divorciado(a),Viudo(a),Conviviente',
            'operador' => 'nullable|string|max:100',
            'cuenta_bancaria' => 'nullable|string|max:50',
            'banco' => 'nullable|string|max:100',
            'talla_pantalon' => 'nullable|string|max:5',
            'talla_casaca' => 'nullable|string|max:5',
            'talla_polo' => 'nullable|string|max:5',
            'talla_camisa' => 'nullable|string|max:5',
            'talla_zapato' => 'nullable|string|max:5',
            'tipo_licencia' => 'nullable|string|max:6',
            'placa' => 'nullable|string|max:10',
            'ciudad_postular' => 'nullable|string|max:100',
            'distrito' => 'nullable|string|max:100',
            'departamento' => 'nullable|string|max:100',
            'provincia' => 'nullable|string|max:100',
            'curso' => 'nullable|string|max:100',
            'carnet' => 'nullable|string|max:50',
            'detalle_experiencia' => 'nullable|string',

            // Campos de archivo (PDFs e imagen)
            'pdf_dni_hijos' => 'nullable|file|mimes:pdf|max:2048',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'pdf_antecedentes_penales' => 'nullable|file|mimes:pdf|max:2048',
            'pdf_carnet_vacuna' => 'nullable|file|mimes:pdf|max:2048',
            'pdf_recibo_agua' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'pdf_certificado_estudios' => 'nullable|file|mimes:pdf|max:2048',
            'pdf_certiadulto' => 'nullable|file|mimes:pdf|max:2048',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf_curso' => 'nullable|file|mimes:pdf|max:2048',
            'pdf_licencia_l1_sucamec' => 'nullable|file|mimes:pdf|max:2048',
            'pdf_licencia_l4_sucamec' => 'nullable|file|mimes:pdf|max:2048',
            'pdf_licencia_l5_sucamec' => 'nullable|file|mimes:pdf|max:2048',

            //Nuevos campos agregados 24-10-2025 (10 items)
            'referencia_contacto' => 'nullable|string',
            'referencia_detalle' => 'nullable|string',
            'emo' => 'nullable|file|mimes:pdf|max:2048',
            'detalle_emo' => 'nullable|string',
            'modo_reclutado' => 'nullable|string',
            'documentado_por' => 'nullable|string',
            'cliente' => 'nullable|string',
            'puesto' => 'nullable|string',
            'pdf_antecedentes_policiales' => 'nullable|file|mimes:pdf|max:2048',
            'preguntas' => 'nullable|string',
        ]);

        // --- 2. PREPARAR DATOS PARA GUARDAR ---
        $data = $request->all();

        // Manejar la lógica condicional: si la bandera es 0, el campo relacionado es NULL.
        $data['numero_vacunas'] = $request->vacunado ? $request->numero_vacunas : null;
        $data['tipo_vehiculo'] = $request->tiene_vehiculo ? $request->tipo_vehiculo : null;
        $data['numero_soat'] = $request->tiene_soat ? $request->numero_soat : null;
        $data['vigencia_licencia_l1'] = $request->tiene_licencia_l1 ? $request->vigencia_licencia_l1 : null;
        $data['vigencia_licencia_l4'] = $request->tiene_licencia_l4 ? $request->vigencia_licencia_l4 : null;
        $data['vigencia_licencia_l5'] = $request->tiene_licencia_l5 ? $request->vigencia_licencia_l5 : null;

        // Calcular IMC si se proporcionaron estatura y peso
        if (!empty($data['estatura']) && !empty($data['peso'])) {
            $data['imc'] = round($data['peso'] / ($data['estatura'] ** 2), 1);
        } else {
            $data['imc'] = null;
        }

        // --- 3. MANEJO DE ARCHIVOS ---
        // Crear el postulante primero para obtener su ID y usarla en la ruta del archivo
        $postulante = Postulante::create($data);

        $this->guardarArchivos($request, $postulante);

        return redirect()->route('postulantes.index')
            ->with('success', 'Postulante "' . $postulante->apellidos_nombres . '" registrado correctamente.');
    }

    /**
     * Ver detalles de un postulante
     * (Sin cambios aquí, pero la vista 'postulantes.show' necesitará todos los nuevos campos)
     */
    public function show(Postulante $postulante)
    {
        // Cargar relaciones si las tienes
        $postulante->load('documentos', 'postulaciones');
        return view('postulantes.show', compact('postulante'));
    }

    /**
     * Formulario de edición
     * (Sin cambios aquí, pero la vista 'postulantes.edit' necesitará todos los nuevos campos)
     */
    public function edit(Postulante $postulante)
    {
        return view('postulantes.edit', compact('postulante'));
    }

    /**
     * Actualizar datos del postulante
     */
    public function update(Request $request, Postulante $postulante)
    {
        // --- 1. VALIDACIÓN (Tus reglas, que son opcionales) ---
        $request->validate([
            'apellidos_nombres' => 'nullable|string|max:255',
            'dni' => 'nullable|string|max:15|unique:postulantes,dni,' . $postulante->id,
            'email' => 'nullable|email',
            'telefono' => 'nullable|string|max:50',
            'direccion' => 'nullable|string|max:255',
            'estado' => 'nullable|in:nuevo,en evaluación,aceptado,rechazado,re-postulación',
            'fecha_nacimiento' => 'nullable|date',
            'vacunado' => 'nullable|boolean',
            'tiene_vehiculo' => 'nullable|boolean',
            'tiene_soat' => 'nullable|boolean',
            'tiene_licencia_l1' => 'nullable|boolean',
            'tiene_licencia_l4' => 'nullable|boolean',
            'tiene_licencia_l5' => 'nullable|boolean',
            'recibo_agua' => 'nullable|boolean',
            'certificado_estudios' => 'nullable|boolean',
            'certiadulto' => 'nullable|boolean',
            'multa_electoral' => 'nullable|boolean',
            'antecedentes_penales' => 'nullable|boolean',
            'numero_vacunas' => 'nullable|integer|min:1',
            'tipo_vehiculo' => 'nullable|string|max:50',
            'numero_soat' => 'nullable|string|max:20',
            'vigencia_licencia_l1' => 'nullable|date',
            'vigencia_licencia_l4' => 'nullable|date',
            'vigencia_licencia_l5' => 'nullable|date',
            'estatura' => 'nullable|numeric|between:0.50,2.50',
            'peso' => 'nullable|numeric|between:20,300',
            'numero_hijos' => 'nullable|integer|min:0',
            'sexo' => 'nullable|in:Masculino,Femenino,Otro,No especifica',
            'estado_civil' => 'nullable|in:Soltero(a),Casado(a),Divorciado(a),Viudo(a),Conviviente',
            'operador' => 'nullable|string|max:100',
            'cuenta_bancaria' => 'nullable|string|max:50',
            'banco' => 'nullable|string|max:100',
            'talla_pantalon' => 'nullable|string|max:5',
            'talla_casaca' => 'nullable|string|max:5',
            'talla_polo' => 'nullable|string|max:5',
            'talla_camisa' => 'nullable|string|max:5',
            'talla_zapato' => 'nullable|string|max:5',
            'tipo_licencia' => 'nullable|string|max:6',
            'placa' => 'nullable|string|max:10',
            'ciudad_postular' => 'nullable|string|max:100',
            'distrito' => 'nullable|string|max:100',
            'departamento' => 'nullable|string|max:100',
            'provincia' => 'nullable|string|max:100',
            'curso' => 'nullable|string|max:100',
            'carnet' => 'nullable|string|max:50',
            'detalle_experiencia' => 'nullable|string',
            'pdf_dni_hijos' => 'nullable|file|mimes:pdf|max:2048',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'pdf_antecedentes_penales' => 'nullable|file|mimes:pdf|max:2048',
            'pdf_carnet_vacuna' => 'nullable|file|mimes:pdf|max:2048',
            'pdf_recibo_agua' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'pdf_certificado_estudios' => 'nullable|file|mimes:pdf|max:2048',
            'pdf_certiadulto' => 'nullable|file|mimes:pdf|max:2048',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf_curso' => 'nullable|file|mimes:pdf|max:2048',
            'pdf_licencia_l1_sucamec' => 'nullable|file|mimes:pdf|max:2048',
            'pdf_licencia_l4_sucamec' => 'nullable|file|mimes:pdf|max:2048',
            'pdf_licencia_l5_sucamec' => 'nullable|file|mimes:pdf|max:2048',

            //Nuevos campos agregados 24-10-2025 (10 items)
            'referencia_contacto' => 'nullable|string',
            'referencia_detalle' => 'nullable|string',
            'emo' => 'nullable|file|mimes:pdf|max:2048',
            'detalle_emo' => 'nullable|string',
            'modo_reclutado' => 'nullable|string',
            'documentado_por' => 'nullable|string',
            'cliente' => 'nullable|string',
            'puesto' => 'nullable|string',
            'pdf_antecedentes_policiales' => 'nullable|file|mimes:pdf|max:2048',
            'preguntas' => 'nullable|string',
        ]);

        // --- 2. PREPARAR DATOS PARA ACTUALIZAR ---
        // INICIO - CAMBIO CLAVE PARA MANEJO DE ARCHIVOS

        // Guardar archivos y obtener sus rutas
        $rutasArchivos = $this->guardarArchivos($request, $postulante);

        // Obtener todos los datos del formulario EXCEPTO los campos de archivo
        // Esto evita que los objetos UploadedFile se incluyan en $data
        $nombresDeCamposArchivo = array_keys($rutasArchivos);
        $data = $request->except($nombresDeCamposArchivo);

        // FIN - CAMBIO CLAVE

        // Manejar checkboxes que no se envían (marcarlos como 0)
        $data['vacunado'] = $request->vacunado ?? 0;
        $data['tiene_vehiculo'] = $request->tiene_vehiculo ?? 0;
        $data['tiene_soat'] = $request->tiene_soat ?? 0;
        $data['tiene_licencia_l1'] = $request->tiene_licencia_l1 ?? 0;
        $data['tiene_licencia_l4'] = $request->tiene_licencia_l4 ?? 0;
        $data['tiene_licencia_l5'] = $request->tiene_licencia_l5 ?? 0;
        $data['antecedentes_penales'] = $request->antecedentes_penales ?? 0;
        $data['certificado_estudios'] = $request->certificado_estudios ?? 0;
        $data['certiadulto'] = $request->certiadulto ?? 0;
        $data['recibo_agua'] = $request->recibo_agua ?? 0;
        $data['multa_electoral'] = $request->multa_electoral ?? 0;

        // Manejar la lógica condicional
        $data['numero_vacunas'] = $request->vacunado ? $request->numero_vacunas : null;
        $data['tipo_vehiculo'] = $request->tiene_vehiculo ? $request->tipo_vehiculo : null;
        $data['placa'] = $request->tiene_vehiculo ? $request->placa : null;
        $data['numero_soat'] = $request->tiene_soat ? $request->numero_soat : null;
        $data['vigencia_licencia_l1'] = $request->tiene_licencia_l1 ? $request->vigencia_licencia_l1 : null;
        $data['vigencia_licencia_l4'] = $request->tiene_licencia_l4 ? $request->vigencia_licencia_l4 : null;
        $data['vigencia_licencia_l5'] = $request->tiene_licencia_l5 ? $request->vigencia_licencia_l5 : null;

        // Calcular IMC si se proporcionaron estatura y peso
        if (!empty($data['estatura']) && !empty($data['peso'])) {
            $data['imc'] = round($data['peso'] / ($data['estatura'] ** 2), 1);
        } else {
            $data['imc'] = null;
        }

        // --- 3. UNIR DATOS LIMPIOS CON RUTAS DE ARCHIVOS Y ACTUALIZAR ---
        $datosFinales = array_merge($data, $rutasArchivos);
        $postulante->update($datosFinales);

        return redirect()->route('postulantes.index')
            ->with('success', 'Postulante "' . $postulante->apellidos_nombres . '" actualizado correctamente.');
    }

    /**
     * Eliminar postulante y sus archivos asociados
     */
    public function destroy(Postulante $postulante)
    {
        $nombrePostulante = $postulante->apellidos_nombres;

        // --- 1. ELIMINAR ARCHIVOS DEL ALMACENAMIENTO ---
        $this->eliminarArchivos($postulante);

        // --- 2. ELIMINAR REGISTRO DE LA BD ---
        $postulante->delete();

        return redirect()->route('postulantes.index')
            ->with('success', 'Postulante "' . $nombrePostulante . '" y sus archivos asociados han sido eliminados.');
    }

    public function descargarDocumentos(Postulante $postulante)
    {
        // 1. Asegurarse de que la carpeta 'temp' exista.
        $tempDir = 'temp';
        if (!Storage::disk('public')->exists($tempDir)) {
            Storage::disk('public')->makeDirectory($tempDir);
        }

        // 2. Definir la ruta y el nombre del archivo ZIP
        $zipFileName = Str::slug($postulante->apellidos_nombres) . '_' . $postulante->ciudad_postular . '.zip';
        $zipPath = storage_path('app/public/' . $tempDir . '/' . $zipFileName);

        // 3. Inicializar ZipArchive y un contador para los archivos añadidos
        $zip = new ZipArchive;
        $archivosAgregados = 0;

        // 4. Intentar abrir el archivo ZIP para escritura
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            // Lista de campos que contienen rutas de archivos
            $camposArchivo = [
                'pdf_dni_hijos' => 'DNI_Hijos.pdf',
                'cv' => 'CV.pdf',
                'pdf_antecedentes_penales' => 'Antecedentes_Penales.pdf',
                'pdf_carnet_vacuna' => 'Carnet_Vacuna.pdf',
                'pdf_recibo_agua' => 'Recibo_Agua.pdf',
                'pdf_certificado_estudios' => 'Certificado_Estudios.pdf',
                'pdf_certiadulto' => 'Certiadulto.pdf',
                'foto' => 'Foto.' . pathinfo($postulante->foto, PATHINFO_EXTENSION),
                'pdf_curso' => 'Curso.pdf',
                'pdf_licencia_l1_sucamec' => 'Licencia_L1_SUCAMEC.pdf',
                'pdf_licencia_l4_sucamec' => 'Licencia_L4_SUCAMEC.pdf',
                'pdf_licencia_l5_sucamec' => 'Licencia_L5_SUCAMEC.pdf',
                'pdf_antecedentes_policiales' => 'Antecedentes_Policiales.pdf',
                'emo' => 'Emo_Ingreso.pdf',
            ];

            // 5. Añadir los archivos encontrados al ZIP
            foreach ($camposArchivo as $campo => $nombreEnZip) {
                if ($postulante->$campo && Storage::disk('public')->exists($postulante->$campo)) {
                    $filePath = Storage::disk('public')->path($postulante->$campo);
                    if ($zip->addFile($filePath, $nombreEnZip)) {
                        $archivosAgregados++;
                    }
                }
            }

            // --- NUEVO: AÑADIR LA FICHA PDF AL ZIP ---

            // 6. Preparar los datos para la vista del PDF (igual que en tu función descargarFicha)
            $data = [
                'postulante' => $postulante,
                'imc' => $postulante->imc,
                'categoria' => null,
                'categoriaClase' => '',
            ];

            // 7. Calcular categoría del IMC
            if ($data['imc']) {
                if ($data['imc'] < 18.5) {
                    $data['categoria'] = 'Bajo Peso';
                    $data['categoriaClase'] = 'text-primary';
                } elseif ($data['imc'] < 25) {
                    $data['categoria'] = 'Normal';
                    $data['categoriaClase'] = 'text-success';
                } elseif ($data['imc'] < 30) {
                    $data['categoria'] = 'Sobrepeso';
                    $data['categoriaClase'] = 'text-warning';
                } else {
                    $data['categoria'] = 'Obesidad';
                    $data['categoriaClase'] = 'text-danger';
                }
            }

            // 8. Generar el PDF desde la vista
            $pdf = PDF::loadView('postulantes.ficha-pdf', $data);

            // 9. Obtener el contenido del PDF como una cadena de texto
            $fichaPdfContent = $pdf->output();

            // 10. Añadir el contenido del PDF al archivo ZIP con un nombre descriptivo
            $zip->addFromString('Ficha.pdf', $fichaPdfContent);

            // Incrementamos el contador para que el ZIP no se considere vacío
            $archivosAgregados++;

            // --- FIN DE LO NUEVO ---

            $zip->close();
        } else {
            return back()->with('error', 'No se pudo crear el archivo ZIP. Revisa los permisos de la carpeta storage.');
        }

        // 11. Verificar si se añadió algún archivo al ZIP (ahora siempre habrá al menos la ficha)
        if ($archivosAgregados === 0) {
            if (file_exists($zipPath)) {
                unlink($zipPath);
            }
            return back()->with('error', 'No se encontraron documentos para este postulante.');
        }

        // 12. Descargar el archivo y eliminarlo después de enviarlo
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

    /**
     * Función auxiliar para guardar archivos
     */
    /**
     * Función auxiliar para guardar archivos y devolver las rutas.
     * Ya no actualiza el modelo directamente.
     *
     * @param Request $request
     * @param Postulante $postulante
     * @return array Un array asociativo con los nombres de campo y sus nuevas rutas.
     */
    private function guardarArchivos(Request $request, Postulante $postulante)
    {
        $camposArchivo = [
            'pdf_dni_hijos',
            'cv',
            'pdf_antecedentes_penales',
            'pdf_carnet_vacuna',
            'pdf_recibo_agua',
            'pdf_certificado_estudios',
            'pdf_certiadulto',
            'foto',
            'pdf_curso',
            'pdf_licencia_l1_sucamec',
            'pdf_licencia_l4_sucamec',
            'pdf_licencia_l5_sucamec',
            'emo',
            'pdf_antecedentes_policiales'
        ];

        $rutasArchivos = [];

        foreach ($camposArchivo as $campo) {
            if ($request->hasFile($campo)) {
                // Eliminar archivo anterior si existe
                if ($postulante->$campo && Storage::disk('public')->exists($postulante->$campo)) {
                    Storage::disk('public')->delete($postulante->$campo);
                }

                $archivo = $request->file($campo);
                $nombreArchivo = time() . '_' . Str::slug($postulante->apellidos_nombres) . '_' . $campo . '.' . $archivo->getClientOriginalExtension();
                $ruta = $archivo->storeAs('postulantes/' . $postulante->id, $nombreArchivo, 'public');

                // Guardamos la ruta en el array en lugar de actualizar el modelo
                $rutasArchivos[$campo] = $ruta;
            }
        }

        return $rutasArchivos;
    }

    /**
     * Función auxiliar para eliminar archivos al borrar un postulante
     */
    private function eliminarArchivos(Postulante $postulante)
    {
        $camposArchivo = [
            'pdf_dni_hijos',
            'cv',
            'pdf_antecedentes_penales',
            'pdf_carnet_vacuna',
            'pdf_recibo_agua',
            'pdf_certificado_estudios',
            'pdf_certiadulto',
            'foto',
            'pdf_curso',
            'pdf_licencia_l1_sucamec',
            'pdf_licencia_l4_sucamec',
            'pdf_licencia_l5_sucamec',
            'emo',
            'pdf_antecedentes_policiales'
        ];

        foreach ($camposArchivo as $campo) {
            if ($postulante->$campo && Storage::disk('public')->exists($postulante->$campo)) {
                Storage::disk('public')->delete($postulante->$campo);
            }
        }
    }

    public function filtrar(Request $request)
    {
        $estado = $request->query('estado', 'todos'); // Obtiene el parámetro 'estado', por defecto 'todos'

        $query = Postulante::query(); // Inicia la consulta

        // Si el estado no es 'todos', aplica el filtro
        if ($estado !== 'todos') {
            // Mapea el valor del data-estado al valor real en la base de datos si es necesario
            // Ej. 'evaluacion' -> 'en evaluación'
            $mapaEstados = [
                'evaluacion' => 'en evaluación',
                'repostulacion' => 're-postulación',
            ];

            $valorEstado = $mapaEstados[$estado] ?? $estado;
            $query->where('estado', $valorEstado);
        }

        // CAMBIO: Asegurarse de incluir el campo created_at en los resultados
        // Usamos select() para especificar explícitamente los campos que queremos incluir
        $postulantesFiltrados = $query->select(
            'id',
            'apellidos_nombres',
            'dni',
            'email',
            'telefono',
            'estado',
            'created_at' // <- Aseguramos que se incluya la fecha de creación
        )->latest()->get();

        // Devuelve los resultados en formato JSON
        return response()->json($postulantesFiltrados);
    }

    public function descargarFicha(Postulante $postulante)
    {
        // Preparar los datos para la vista del PDF
        $data = [
            'postulante' => $postulante,
            'imc' => $postulante->imc,
            'categoria' => null,
            'categoriaClase' => '',
        ];

        // Calcular categoría del IMC
        if ($data['imc']) {
            if ($data['imc'] < 18.5) {
                $data['categoria'] = 'Bajo Peso';
                $data['categoriaClase'] = 'text-primary';
            } elseif ($data['imc'] < 25) {
                $data['categoria'] = 'Normal';
                $data['categoriaClase'] = 'text-success';
            } elseif ($data['imc'] < 30) {
                $data['categoria'] = 'Sobrepeso';
                $data['categoriaClase'] = 'text-warning';
            } else {
                $data['categoria'] = 'Obesidad';
                $data['categoriaClase'] = 'text-danger';
            }
        }

        // Generar el PDF
        $pdf = PDF::loadView('postulantes.ficha-pdf', $data);

        // Descargar el PDF
        return $pdf->download('ficha-' . str_replace(' ', '-', $postulante->apellidos_nombres) . '.pdf');
    }








    public function descargarTodosVisibles(Request $request)
    {
        // 1. Validar y obtener los IDs
        $ids = $request->input('ids');
        if (!$ids || !is_array($ids) || empty($ids)) {
            return response('No se proporcionaron IDs de postulantes.', 400);
        }

        // 2. Buscar a los postulantes
        $postulantes = Postulante::whereIn('id', $ids)->get();
        if ($postulantes->isEmpty()) {
            return response('No se encontraron postulantes con los IDs proporcionados.', 404);
        }

        // 3. Preparar el archivo ZIP principal
        $tempDir = 'temp';
        if (!Storage::disk('public')->exists($tempDir)) {
            Storage::disk('public')->makeDirectory($tempDir);
        }
        $zipFileName = 'documentos_masivos_' . date('Y-m-d_H-i-s') . '.zip';
        $zipPath = storage_path('app/public/' . $tempDir . '/' . $zipFileName);

        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
            return back()->with('error', 'No se pudo crear el archivo ZIP masivo.');
        }

        // 4. Iterar sobre cada postulante y añadir sus archivos al ZIP
        foreach ($postulantes as $postulante) {
            // Crear un nombre de carpeta único para cada postulante
            $nombreCarpeta = Str::slug($postulante->apellidos_nombres) . '_' . $postulante->ciudad_postular;

            // Lista de archivos del postulante
            $camposArchivo = [
                'pdf_dni_hijos' => 'DNI_Hijos.pdf',
                'cv' => 'CV.pdf',
                'pdf_antecedentes_penales' => 'Antecedentes_Penales.pdf',
                'pdf_carnet_vacuna' => 'Carnet_Vacuna.pdf',
                'pdf_recibo_agua' => 'Recibo_Agua.pdf',
                'pdf_certificado_estudios' => 'Certificado_Estudios.pdf',
                'pdf_certiadulto' => 'Certiadulto.pdf',
                'foto' => 'Foto.' . pathinfo($postulante->foto, PATHINFO_EXTENSION),
                'pdf_curso' => 'Curso.pdf',
                'pdf_licencia_l1_sucamec' => 'Licencia_L1_SUCAMEC.pdf',
                'pdf_licencia_l4_sucamec' => 'Licencia_L4_SUCAMEC.pdf',
                'pdf_licencia_l5_sucamec' => 'Licencia_L5_SUCAMEC.pdf',
                'pdf_antecedentes_policiales' => 'Antecedentes_Policiales.pdf',
                'emo' => 'Emo_Ingreso.pdf',
            ];

            // Añadir archivos existentes a la carpeta del postulante en el ZIP
            foreach ($camposArchivo as $campo => $nombreEnZip) {
                if ($postulante->$campo && Storage::disk('public')->exists($postulante->$campo)) {
                    $filePath = Storage::disk('public')->path($postulante->$campo);
                    // El segundo parámetro ahora incluye la ruta de la carpeta
                    $zip->addFile($filePath, $nombreCarpeta . '/' . $nombreEnZip);
                }
            }

            // Generar y añadir la ficha PDF a la carpeta del postulante
            $data = [
                'postulante' => $postulante,
                'imc' => $postulante->imc,
                'categoria' => null,
                'categoriaClase' => '',
            ];
            // Calcular categoría del IMC
            if ($data['imc']) {
                if ($data['imc'] < 18.5) {
                    $data['categoria'] = 'Bajo Peso';
                    $data['categoriaClase'] = 'text-primary';
                } elseif ($data['imc'] < 25) {
                    $data['categoria'] = 'Normal';
                    $data['categoriaClase'] = 'text-success';
                } elseif ($data['imc'] < 30) {
                    $data['categoria'] = 'Sobrepeso';
                    $data['categoriaClase'] = 'text-warning';
                } else {
                    $data['categoria'] = 'Obesidad';
                    $data['categoriaClase'] = 'text-danger';
                }
            }
            $pdf = PDF::loadView('postulantes.ficha-pdf', $data);
            $fichaPdfContent = $pdf->output();
            $zip->addFromString($nombreCarpeta . '/Ficha_Postulante.pdf', $fichaPdfContent);
        }

        $zip->close();

        // 5. Descargar el archivo ZIP y eliminarlo
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

}