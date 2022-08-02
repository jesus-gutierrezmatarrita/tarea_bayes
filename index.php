<?php include('head.php') ?>

        <div class="container">
            <h1 class="mt-5">Objetivos de desarrollo</h1>

            <ol>
                <li>
                    Crear un sitio de Internet (puede usar cualquiera de los servidores de la Sede del Atlántico, sea Turrialba,
                    Guayabo o el de Paraíso o bien puede utilizar otro fuera de la universidad) en JS y
                    PHP (puede usar el servidor MySQL de Turrialba o el de Paraíso, si lo considera necesario). Ese sitio
                    tendrá una página de ingreso con un menú para navegar por diferentes opciones.
                </li>
                <li>
                    Poseer un menú permitirá escoger varios formularios donde se podrán ingresar datos de
                    personas o cosas para encontrar los más parecidos o los más diferentes de un conjunto de
                    datos proporcionado más adelante. Este menú nunca debe desaparecer de la vista del
                    usuario y deberá permanecer ubicado en la misma posición de la página o pantalla.
                </li>
                <li>
                    Los formularios que el sitio incluirá son:
                        <ol>
                            <li>
                                El mismo formulario que Ud. llenó en el URL <a href="http://multi.ucr.ac.cr/estilo.htm"
                                target="_blank" rel="noopener noreferrer">http://multi.ucr.ac.cr/estilo.htm</a>,
                                para detectar el estilo de aprendizaje, puede copiarlo y variar la presentación cuanto considere
                                pertinente. De ese formulario aprovechará el cálculo que da por resultado los valores de
                                las cuatro columnas. Elimine el resto del algoritmo de cálculo incluido en el código
                                JavaScript, porque para determinar el estilo de aprendizaje usará la fórmula de Bayes vista en
                                clases en lugar del algoritmo original, tomando en cuenta los resultados de las cuatro columnas (CA, EC, EA, OR).
                            </li>
                            <li>
                                Otro formulario para adivinar el recinto de origen de un estudiante (Paraíso o Turrialba),
                                donde el usuario podrá seleccionar su estilo de aprendizaje de los cuatro usados
                                (divergente, convergente, asimilador, acomodador), su último promedio para matrícula y
                                su sexo. Usará el algoritmo de Bayes visto en clases.
                            </li>
                        </ol>
                </li>
            </ol>
        </div>
<?php include('footer.php') ?>

    <!--
2. 

3.2. 
3.3. Otro formulario para adivinar el sexo de un estudiante, donde el usuario podrá
seleccionar
su estilo de aprendizaje de los cuatro usados (divergente, convergente, asimilador,
acomodador), su
último promedio para matrícula y su recinto (Paraíso o Turrialba). Usará el algoritmo de Bayes
visto
en clases.
3.4. Otro formulario para adivinar el estilo de aprendizaje de un estudiante (divergente,
convergente, asimilador, acomodador), donde el usuario podrá seleccionar su recinto
(Paraíso o Turrialba), su último promedio para matrícula y su sexo. Usará el algoritmo de
Bayes visto
en clases.
3.5. Otro formulario para determinar el tipo de profesor (beginner, intermediate, advanced), a
partir de los siguientes criterios que el usuario podrá definir gracias a la interfaz. Usará el
algoritmo de
Bayes visto en clases.
Demographic
A. Age.
● 1= teacher’s age <= 30
● 2= teacher’s age > 30 AND <= 55
● 3= teacher’s age > 55
B. Gender.
● F= female
● M= male
● NA= not available
Background
C. Teacher’s self-evaluation of his skill or experience teaching the selected
subject.
● B= beginner
● I= intermediate
● A= advanced
D. Number of times the teacher has taught this type of course.
● 1= never
● 2= 1 to 5 times● 3= more than 5 times
E. Teacher’s background discipline or area of expertise.
● DM= decision-making
● ND= network design
● O= other
F. Teacher’s skills using computers.
● L= low
● A= average
● H= high
G. Teacher’s experience using Web-based technology for teaching.
● N= never
● S= sometimes
● O= often
H. Teacher’s experience using a Web site.
● N= never
● S= sometimes
● O= often
3.6. Otro formulario para determinar la clasificación de redes (clases A o B), a partir de los
siguientes criterios que el usuario podrá definir gracias a la interfaz. Usará el algoritmo de
Bayes visto
en clases.
The network reliability → Reliability (Re): 2 to 5.
The number of links → Number of links (Li): 7 to 20.
The total network capacity → Capacity (Ca): low, medium, high.
The network cost → Cost (Co): low, medium, high.
4.
Para cada uno de los formularios del objetivo 3, use el algoritmo de Bayes como fue visto en
clase y
que está explicado en el archivo “Similiarityv5.pdf”.
En relación con el formulario 3.1, su sitio Web debe determinar el estilo de aprendizaje
tomando en
cuenta los resultados de las cuatro columnas (CA, EC, EA, OR). En lugar del algoritmo original
(el que
está en JavaScript y que termina obteniendo las coordenadas vertical CA-EC y horizontal EA-
OR), su
tarea usará la fórmula de cálculo de Bayes. Tomará los valores CA, EC, EA, OR generados
a partir de los datos llenados por el usuario y los clasificará con base en una base de datos
que incluye
esos valores de unos 200 estudiantes (hoja “RecintoEstilo” del libro Excel “DatosTarea1.xls”).
Al final,
su algoritmo de Bayes encontrará la clase más probable y el estilo asignado a ella será el
estilo del
registro propuesto en el formulario. Su interfaz mostrará el estilo asignado a la clase en que el
algoritmo clasificó los datos dados a partir del formulario.
En relación con los formularios de los puntos 3.2, 3.3 y 3.4, su tarea debería aprovechar el
código del
algoritmo de Bayes usado en el punto 3.1 con el fin de calcular la clasificación de los datos
especificados por el usuario en cada uno de esos formularios y 77 registros que incluyendatos para
sexo, recinto, último promedio de matrícula, valores para CA, EC, EA, OR y estilo de
aprendizaje (eso
también está en una hoja “EstiloSexoPromedioRecinto” del libro Excel “DatosTarea1,xls”). Lo
que
pasa es que con estos tres formularios no se usan los valores CA, EC, EA, OR sino el recinto de
origen
de cada estudiante (Paraíso o Turrialba), el estilo de aprendizaje de los cuatro usados
(divergente,
convergente, asimilador, acomodador), el último promedio para matrícula de cada alumno en
la base y
el sexo de cada quien.
Cuando el usuario detalla sus datos en cada formulario y los envía, el sitio de Internet clasifica
esos
datos y encuentra la clase más probable y de allí se toma la información buscada, por
ejemplo, el
recinto, el sexo o el estilo de aprendizaje que se desplegará en la interfaz.
En el formulario del punto 3.5, también se clasificará a partir de los ocho criterios usados en
el respectivo formulario. Los datos aportados desde la interfaz se clasifican a partir de la base
de
profesores (teachers) que incluye tres clases o tipos de educadores. La respuesta es la clase o
tipo de
maestro al que pertenece o en el que su aplicación clasifica al registro dado desde el
formulario.
En cuanto al formulario 3.6, el usuario escogerá los valores de los cuatro atributos de una
supuesta red
y su sitio buscará la clase A o B entre una base de configuraciones de redes.
Con base en la clase de redes más probable, su algoritmo de cálculo de Bayes determinará si
el
ejemplo de red dado desde el formulario pertenece a la clase o tipo A o si se puede clasificar
como
clase B y así lo desplegará en la interfaz.
5.
El código que Ud. escriba deberá estar documentado con detalle y claridad para que el
profesor
pueda comprender y revisar lo que Ud. hizo, paso a paso. En particular, debe quedar claro
como
su algoritmo se adapta para clasificar en relación con los formularios de los punto de 3.1 a
3.6. y cómo
clasifica el ejemplo dado en la clase más probable. Recuerde que deberá usar el algoritmo de
Bayes
como fue explicado en clases.
Si Ud. quiere, puede agregar trabajo extra que el profesor tomará en cuenta: evaluar la
eficiencia del
algoritmo de cálculo de Bayes mediante un método llamado “10-fold cross-validation”. Eso lo
puede
hacer con la base de 200 registros, por ejemplo. Eso implica incluir el código, documentado,
que hacelas pruebas y los resultados por cada bloque y el porcentaje final de eficiencia. Eso debería
verse
mediante un link en el menú general del sitio.
“Cross-validation is a procedure that consists of dividing the training dataset data into a
number k of
blocks or partitions. Testing is performed by extracting one partition from the dataset; each
example of
the extracted block is classified to measure the error rate of the classifier. After finishing with
a
partition, it is reinserted into the dataset and another block of examples is tested. These
operations are
repeated for each partition, and finally, an average of the number of errors is calculated. The
inverse of
this average shows the degree of accuracy of the classifier”.
Datos proporcionados para la tarea.
En el sitio en línea se facilita un archivo Excel (extensión xls) con los siguientes datos:
Cerca de 200 registros para lo referente al formulario de estudiantes 3.1.
Cerca de 80 registros para lo referente a formularios de estudiantes 3.2, 3.3, 3.4.
Cerca de 20 registros para lo referente a formularios de profesores 3.5.
Cerca de 35 registros para lo referente a redes formulario 3.6".
Para esta prueba de ampliación, Ud. no incluirá ni entregará nada acerca de la sección que
dice:
"Si Ud. quiere, puede agregar trabajo extra que el profesor tomará en cuenta: evaluar la
eficiencia del
algoritmo de cálculo de Bayes mediante un método llamado “10-fold cross-validation”. Eso lo
puede
hacer con la base de 200 registros, por ejemplo. Eso implica incluir el código, documentado,
que hace
las pruebas y los resultados por cada bloque y el porcentaje final de eficiencia. Eso debería
verse
mediante un link en el menú general del sitio.
'Cross-validation is a procedure that consists of dividing the training dataset data into a
number k of
blocks or partitions. Testing is performed by extracting one partition from the dataset; each
example of
the extracted block is classified to measure the error rate of the classifier. After finishing with
a
partition, it is reinserted into the dataset and another block of examples is tested. These
operations are
repeated for each partition, and finally, an average of the number of errors is calculated. The
inverse of
this average shows the degree of accuracy of the classifier'”.
Esa evaluación opcional no es parte de esta prueba de ampliación.
Esta prueba de ampliación no vale un 10%, como dice en el enunciado de la tarea 2, porque
es una prueba diferente que le permitirá o no ganar el curso.Deberá presentar su prueba de ampliación sin errores, cumpliendo con las instrucciones que
acompañaron desde el inicio a esa tarea, con un alto grado calidad de fondo y forma que le
permita pasar el curso.
La dirección al sitio de Internet con el servidor con su prueba debe estar accesible para que
el profesor la revise desde cualquier computador de escritorio o dispositivo móvil.
Cada página de ese sitio debe retornar bien las respuestas buenas. Esas páginas no deben
mostrar mensajes de errores o avisos (warnings), deben validar que los valores ingresados
cumplan con los formatos apropiados, solicitados de manera clara en cada formulario de cada
página.
Su examen de ampliación deberá ser entregado, en un archivo comprimido, el miércoles 03
de agosto de 2022, a más tardar a las 08:20 horas, subiéndolo en un link o liga que para tal
fin estará en el sitio del curso en Mediación Virtual
"EXAMEN DE AMPLIACION"
https://mv1.mediacionvirtual.ucr.ac.cr/mod/assign/view.php?id=32511
Como en cada tarea, lo que se entrega o sube a Mediación Virtual es un archivo zip con su
número de carnet
como nombre de archivo (ej. A55667.zip) con todos los archivos requeridos de la tarea (URL,
código documentado, datos).
No se admiten ligas (links) a sitios diferentes o repositorios como Github, Dropbox o Google
Drive.
En la sección de comentarios del estudiante NO escriba direcciones u otra información que
deba ir en el archivo que deberá subir.-->