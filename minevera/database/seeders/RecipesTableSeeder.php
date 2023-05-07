<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('recipes')->insert([
            [
                'title' => 'Tortilla de patatas',
                'description' => 'Comenzamos caramelizando la cebolla que nos llevará unos 30 minutos. Para ello, pelamos la cebolla y la cortamos en juliana. Después la ponemos en una sartén a fuego muy lento, removiendo de vez en cuando. Mientras la cebolla se hace, pelamos las patatas y las cortamos en rodajas finas, procurando que todas ellas sean del mismo tamaño. Las dejamos en agua durante 15 minutos y ponemos una sartén con aceite de oliva abundante en el fuego. Sin dar tiempo a que el aceite se caliente, añadimos las patatas y dejamos que se vayan friendo muy despacio, partiendo de un aceite casi en frío. Cuando lleven unos 10 minutos (removiendo de vez en cuando) sube el fuego durante 5 minutos. Sacamos las patatas y las escurrimos bien del aceite, las ponemos en un bol grande. Escurrimos la cebolla cuando esté en su punto, y la ponemos sobre las patatas. Batimos los huevos y los añadimos al bol, y mezclamos todos los ingredientes. Cuajamos la tortilla en una sartén con una cucharada de aceite y le damos la vuelta a las 2-3 minutos.',
                'section' => 'Huevos, Vegetariana',
                'user_id' => 2,
                'created_at' => now(),
            ],
            [
                'title' => 'Pisto de verduras',

                'description' => 'Comenzar cortando la berenjena en rodajas o trozos pequeños y ponerla en un cuenco con sal, durante media hora. Mientras ir picando el resto de las hortalizas. La cebolla en tiras finas, los pimientos en trozos y el calabacín en rodajas y después en cuartos. En una cacerola de fondo grueso echar tres cucharadas de aceite y sofreír la cebolla lentamente durante cinco minutos, hasta que esté blanda. Añadir los pimientos y tres dientes de ajo enteros, bajar un poco el fuego y dejar que las verduras se hagan durante otros siete minutos. Salpimentar. Pasar a una bandeja y reservar. Echar otras dos cucharadas de aceite y añadir la berenjena cocinándola durante 6 o 7 mins. Cuando esté cocinada añadir a la bandeja con la cebolla y los pimientos. Volver a echar aceite en la cacerola y cocinar el calabacín durante cinco minutos, retirar a la bandeja con el resto de vegetales. En la cacerola echar el aceite que nos queda y sofreír los tomates pelados y cortados en cubos sin las semillas, añadir las finas hierbas que teníamos reservadas así como los dientes de ajo que nos quedaban. Cocinarlos bien e ir aplastándolos con un cucharón hasta que queden como una salsa. Añadir las hortalizas que teníamos reservadas y darles unas vueltas cuidadosamente con la salsa de tomate. Cocinar todo junto a fuego medio y tapado durante diez minutos, cuando pase el tiempo destapar la cacerola y bajar el fuego dejándolo otros veinte minutos más. ',
                
                'section' => 'Verduras, Vegetariana',
                
                'user_id' => 2,
                
                'created_at' => now(),
            ],
            [
                'title' => 'Guiso de ternera',

                'description' => 'Troceamos la carne en dados de unos 2 o 3 cm. Calentamos un chorrito de aceite y añadimos la carne. La doramos hasta que quede sellada por toda su superficie. Agregamos las zanahorias cortadas en rodajas finas y la cebolla cortada en daditos. Incorporamos también los dientes de ajo y el tomillo. Continuamos sofriendo las verduras y la carne unos 15 minutos. Salpimentamos y añadimos el vino blanco. Dejamos que se cocine durante unos minutos. Cubrimos con agua y tapamos la cazuela. Cocinamos a temperatura media durante 1 hora. Pasado este tiempo, destapamos la cazuela y seguimos la cocción 45 minutos más. Servimos la carne acompañada de unas patatas fritas en dados.',
                
                'section' => 'Guiso, Carne, Ternera',
                
                'user_id' => 4,
                
                'created_at' => now(),
            ],
            [
                'title' => 'Risotto de champiñones',

                'description' => 'Pela la cebolla y pícala finita con el cuchillo. En una olla (mejor si es baja) echa un poco de aceite y sal y ponla a fuego medio. Cuando esté caliente el aceite incorpora la cebolla y ve removiéndola de vez en cuando. Cocínala alrededor de 5 minutos, mientras preparas los champiñones pícalos en trocitos. Incorpora los champiñones y un poco de pimienta negra cocina juntos 5 minutos más. Ve calentando el caldo que vayas a utilizar. Al cabo de esos 5 minutos sube el fuego para que esté a temperatura alta y vierte el vino blanco tardará unos 2-3 minutos. Ahora con el fuego temperatura media incorpora el arroz y remuévelo bien junto con el resto de ingredientes durante un par de minutos. Ve añadiendo caldo caliente en tandas, unos 200 o 300 ml cada vez, y cuando el arroz lo haya absorbido casi por completo añade otra medida. Mientras haces esto no dejes de remover el arroz. Prueba el arroz cuando pase el tiempo que indica el fabricante (de 15 a 20 minutos). Cuando ya esté listo incorpora el queso parmesano rallado, apaga el fuego y aparta la olla, mezcla el queso con el risotto y tapa la olla para que repose 5 minutos.',
                
                'section' => 'Arroz, Risotto, Vegetariana',
                
                'user_id' => null,

                'created_at' => now(),
            ],
            [
                'title' => 'Lasaña de carne',

                'description' => 'Hacemos las láminas de lasaña como indique el fabricante. Las verduras las cortamos en trocitos pequeños. Reservamos todo en un bol. En otra cazuela echamos aceite. Empezamos introduciendo la cebolla y el ajo, cuando esté doradita, añadimos el resto de ingredientes. Sofreímos todo a temperatura media durante unos 15 minutos y esperamos por la carne. Salpimentamos la carne al gusto y la echamos a la cazuela con la verdura. Dejamos que se pase durante 5 minutos e introducimos el bacon o panceta en trozos muy pequeños. Vertemos un vaso de vino blanco y esperamos otros 5 minutos a fuego medio. Añadimos un vaso de tomate natural, echamos la cucharadita de orégano. Removemos la carne con las verduras y retiramos del fuego, dejamos enfriar un poco. Precalentamos el horno a 200º C durante 15 minutos. Elaborar la bechamel. Ponemos en el fondo de la fuente unas cucharadas de la bechamel y montamos la lasaña con las capas deseadas. Finalmente rematamos con una capa generosa de bechamel. Espolvoreamos el queso al final. Horneamos durante 15 minutos a 180º C y gratinamos durante 3-5 minutos. Lista para comer, no hace falta reposo, del horno a la mesa.',

                'section' => 'Pasta, Lasaña, Carne',

                'user_id' => null,
                
                'created_at' => now(),
            ],
        ]);
    }
}