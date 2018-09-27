<script type="text/javascript" src="http://la.eonline.com/varios/modulos_extra/jquery.min.js"></script>

<?
$pid=$_POST["pid"];

switch ($pid) {
	case 1:
		$nombre="Abril";
		$desc="<p>La protagonista de nuestra historia transita su adolescencia llena de dudas y contradicciones. Toca la guitarra y canta muy bien. Se encuentra en una búsqueda permanente de su propia identidad, y de sus deseos.</p>

			<p>Amante del longboard, lo usa como medio de locomoción. Es intrépida, apasionada, impulsiva y muy talentosa. Se juega sin dudarlo por lo que quiere. La música, el arte, es lo que da sentido a su existencia.</p>

			<p>Cuando se entera de la herencia dejada por su padre, una vieja Estación de bomberos, ve en este espacio la posibilidad de armar un lugar para el arte y, sobre todo, para que sus sueños se puedan expresar y cumplir. Esto es lo que va a perseguir Abril a lo largo de toda la historia.
			</p>";
		break;
	case 2:
		$nombre="Marco";
		$desc="<p>Es el “hermanastro” de Abril. Novio de Leticia. Marco parece un chico independiente y desenvuelto pero en el fondo, vive a la sombra de su padre, quien lo carga de paradigmas para lograr el Éxito. Siguiendo el “deber ser”, Marco se recibió de arquitecto. Pero esto está lejos de lo que realmente a él le gusta: la música. Conocer a Abril cambiará su vida para siempre, se atreverá a enfrentar su miedos y, por fin, a empezar el camino de lo que ama.</p>";
		break;
	case 3:
		$nombre="Leticia";
		$desc="<p>Es la novia de Marco.  Una mujer independiente, muy fuerte, que se construyó a sí misma. Tiene un gran talento en la danza, es la líder de los “Move Sing Move”, un grupo de bailarines que hacen intervenciones y performances con su rostro maquillado. Leticia es la que impulsa muchos de los proyectos de su novio, utilizando su seducción y su gran inteligencia. La aparición de Abril en su vida y en la de Marco será su talón de Aquiles. Y no medirá consecuencias a la hora de enfrentarse a ella.</p>";
		break;
	case 4:
		$nombre="Tomás";
		$desc="<p>Es amigo de Marco. Es lindo, seductor, y talentoso. Está asociado con Marco y su padre para el proyecto del Centro comercial. Tomás es ambicioso y no le gusta que se interpongan en su camino. Desde hace un tiempo ha asumido su homosexualidad. Pero él está atormentado, porque a lo largo de la historia descubre que está secretamente enamorado de Marco, su mejor amigo, y sabe que ese amor nunca será correspondido. </p>";
		break;
	case 5:
		$nombre="Clara";
		$desc="<p>E la madre de Abril. Enviudar fue lo más duro que tuvo que atravesar en su vida. Quedó devastada. Pero hace un tiempo, conoció a Ricardo, el padre de Marco, y recién hoy siente que puede empezar a rehacer su vida.  Pero esto le trae grandes conflictos con Abril que no deja de sentirse invadida. Clara es una mujer valiente. Aunque arrebatada y poco pragmática, siempre sale adelante para darle lo mejor a su hija.</p>";
		break;
	case 6:
		$nombre="Ricardo";
		$desc="<p>Es el padrastro de Abril y padre de Marco. Un hombre ambicioso y algo impulsivo, aunque buena persona. No actúa por maldad, sino por desesperación. Por decisiones apresuradas y poco pensadas, Ricardo se verá envuelto en graves problemas financieros vinculados a La Estación y no tendrá demasiado tacto a la hora de resolverlo.</p>";
		break;
	case 7:
		$nombre="Celeste";
		$desc="<p>Es la gran amiga de Abril. Baterista. Desafiante, positiva, alegre y decidida siempre a salir adelante con las ideas que CREE más justas.
				Conocer a Lucas cambiará su vida, pero la relación con él no será nada fácil, a ambos les costará reconocer lo que les pasa.  Además se cruzará en su camino Bruno,  un director de teatro que se acercará para alquilar la sala,  que complicará todavía más sus dificultades con el amor.</p>";
		break;
	case 8:
		$nombre="Alexis";
		$desc="<p>Soñador, impulsivo, con un enorme sentido del humor. Es el mejor amigo de Abril. Junto a Celeste y Josefina forman un trío inseparable que con el correr de los capítulos deberá fortalecerse para superar los obstáculos que se presenten. Desprejuiciado, libre, espontáneo. Le encanta rematar sus frases con letras de canciones, siempre tiene una ocurrencia desopilante. Pero también, esta personalidad tan desprejuiciada, tan anclada en un presente contínuo le traerá algunos problemas prácticos como lo que significa sustentarse día a día. Durante la historia aparecerá Lady Ant para  revolucionar su vida.</p>";
		break;
	case 9:
		$nombre="Josefina";
		$desc="<p>Es otra de las grandes amigas de Abril y otro talento en la música. Canta como los dioses, pero a pesar de su don natural le cuesta creer en ella. Es aficionada a la fotografía. Trabaja sacando fotos en una revista de chimentos. Si bien es muy linda, buena, simpática, inteligente, ella a veces no se valoriza como debiera. Y así se refleja en la relación que mantiene con Mario, un hombre casado del que está enamorada, pero que nunca termina de corresponderle. El siempre se va y vuelve cuando quiere. Y Josefina lo espera. Pero esta situación de sufrimiento se verá transformada cuando se forme la banda y cuando Josefina conozca a Juan.</p>";
		break;
	case 10:
		$nombre="Juan";
		$desc="<p>Es inocente, ético, y siempre bien dispuesto para lo que haga falta. Soñador, romántico, emprendedor, y perdidamente enamorado de Abril, en un principio. Incluso se arriesga, dada su torpeza, a tomar clases de longboard con ella. Siempre tiene un chiste para alegrar el momento. No le gusta ver a la gente que quiere triste. Y menos que menos a Josefina, de quien se va a ir enamorando aunque ella lo vea muchas veces solamente como un buen amigo.</p>";
		break;
	case 11:
		$nombre="Lucas";
		$desc="<p>Es un rockero nato.  Es ácido, gracioso pero un tipo leal y sincero como pocos. Tiene dos hermanas que le hacen los coros en sus presentaciones pero que no son capaces de hacer una paso de baile para el coro, y siempre desentonan estéticamente. Pero a él no le importa e insiste en llevarlas a todos lados. Es una especie de “Tanguito” que se arremanga sin dudarlo cuando algo se complica. Enamorado de Celeste desde el primer momento, le costará animarse a declararle su amor, más aún cuando aparezca Bruno en la vida de ella.</p>";
		break;
	case 12:
		$nombre="Lady Ant";
		$desc="<p>canta increíble. Y también usa increíbles peinados. Siempre tiene un look que no deja de llamar la atención. Su marca registrada es la originalidad de su vestimenta y de lo que hace con su pelo. Le cuesta mostrarse sin maquillaje pero ella dice que no se oculta, que ella es lo que ven. El encuentro con Alexis la modificará para siempre. Es Alexis quien va a descubrir a la otra Lady Ant; a la que no lleva make up, a la que derrama lágrimas. Será toda una transformación para esta pequeña gran cantante.</p>";
		break;
	case 13:
		$nombre="Los Altman Brothers";
		$desc="<p>Kimey y Manuel (Manu) es un dúo que explota en el escenario. Se  presentan como hermanos de corazón,  pero sus constantes conflictos los tienen en la cuerda floja. Cada situación, cada palabra se torna en un disparador para discusiones desopilantes.</p>";
		break;
	case 14:
		$nombre="Johnny";
		$desc="<p>Un cumbiero de alma, trabaja con su padre en shows barriales. Es fachero, seductor y narcisita. Pero es una pieza fundamental en la banda.</p>";
		break;
	case 15:
		$nombre="Érica";
		$desc="<p>Es un ser de otro planeta, vive en el limbo. Canta como los dioses pero su despiste eterno trae más de un problema a todo el grupo. Hay veces que contesta en ruso ya que tiene una descendencia. Da la impresión que es lesbiana, pero en verdad es algo que hace por que cree que de ese modo atrae a los hombres. Cuando se lookea es muy sexy.</p>";
		break;
	case 16:
		$nombre="Laura";
		$desc="<p>Es tímida y no es consciente de su talento. A lo largo de la serie descubrirá todo su potencial y se animará a desplegarlo.</p>";
		break;
	case 17:
		$nombre="Yahir";
		$desc="<p>Entra en “Estación colectiva”. Muchos lo miran con cierta desconfianza, pero nadie puede negar que tiene un gran talento. En realdiad, Yahir es un infiltrado. Tiene personalidad obsesvia y calculadora. Bastante inadvertido pasa informacion a Leticia. Juega de lobo con piel de cordero.</p>";
		break;
	default:
		# code...
		break;
}
//echo($nombre."----");

$url_compartir="http://".$_SERVER["SERVER_NAME"]."/category/wakeup/?personaje=".trim(strtolower($nombre));

echo '
	<div class="menu-wakeup" >
		<ul>
			<li><a href="javascript:enviar_variables(1);">» Abril</a></li>
			<li><a href="javascript:enviar_variables(2);">» Marco</a></li>
			<li><a href="javascript:enviar_variables(3);">» Leticia</a></li>
			<li><a href="javascript:enviar_variables(4);">» Tomás</a></li>
			<li><a href="javascript:enviar_variables(5);">» Clara</a></li>
			<li><a href="javascript:enviar_variables(6);">» Ricardo</a></li>
			<li><a href="javascript:enviar_variables(7);">» Celeste</a></li>
			<li><a href="javascript:enviar_variables(8);">» Alexis</a></li>
			<li><a href="javascript:enviar_variables(9);">» Josefina</a></li>
			<li><a href="javascript:enviar_variables(10);">» Juan</a></li>
			<li><a href="javascript:enviar_variables(11);">» Lucas</a></li>
			<li><a href="javascript:enviar_variables(12);">» Lady Ant</a></li>
			<li><a href="javascript:enviar_variables(13);">» Los Altman Brothers</a></li>
			<li><a href="javascript:enviar_variables(14);">» Johnny</a></li>
			<li><a href="javascript:enviar_variables(15);">» Érica</a></li>
			<li><a href="javascript:enviar_variables(16);">» Laura</a></li>
			<li><a href="javascript:enviar_variables(17);">» Yahir</a></li>
		</ul>
	</div>

	<div class="content-wakeup">
		<div class="columna_izq">
			<img src="'.$ruta_concurso.'/varios/ms_wakeup/personajes/'.$pid.'.jpg">
		</div>
		<div class="columna_der">
			<h3 class="titulo_fucsia">
				'.$nombre.'
			</h3>
			'.$desc.'
		</div>
	</div>
';?>
