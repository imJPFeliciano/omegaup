<?php

/** ******************************************************************************* *
  *                    !ATENCION!                                                   *
  *                                                                                 *
  * Este codigo es generado automaticamente. Si lo modificas tus cambios seran      *
  * reemplazados la proxima vez que se autogenere el codigo.                        *
  *                                                                                 *
  * ******************************************************************************* */

/** UserFeedbackRating Data Access Object (DAO) Base.
  *
  * Esta clase contiene toda la manipulacion de bases de datos que se necesita para
  * almacenar de forma permanente y recuperar instancias de objetos {@link UserFeedbackRating }.
  * @access public
  * @abstract
  *
  */
abstract class UserFeedbackRatingDAOBase extends DAO
{
	/**
	  *	Guardar registros.
	  *
	  *	Este metodo guarda el estado actual del objeto {@link UserFeedbackRating} pasado en la base de datos. La llave
	  *	primaria indicara que instancia va a ser actualizado en base de datos. Si la llave primara o combinacion de llaves
	  *	primarias describen una fila que no se encuentra en la base de datos, entonces save() creara una nueva fila, insertando
	  *	en ese objeto el ID recien creado.
	  *
	  *	@static
	  * @throws Exception si la operacion fallo.
	  * @param UserFeedbackRating [$UserFeedbackRating] El objeto de tipo UserFeedbackRating
	  * @return Un entero mayor o igual a cero denotando las filas afectadas.
	  **/
	public static final function save( $UserFeedbackRating )
	{
		if (!is_null(self::getByPK( $UserFeedbackRating->rating_id)))
		{
			return UserFeedbackRatingDAOBase::update( $UserFeedbackRating);
		} else {
			return UserFeedbackRatingDAOBase::create( $UserFeedbackRating);
		}
	}

	/**
	  *	Obtener {@link UserFeedbackRating} por llave primaria.
	  *
	  * Este metodo cargara un objeto {@link UserFeedbackRating} de la base de datos
	  * usando sus llaves primarias.
	  *
	  *	@static
	  * @return @link UserFeedbackRating Un objeto del tipo {@link UserFeedbackRating}. NULL si no hay tal registro.
	  **/
	public static final function getByPK(  $rating_id )
	{
		if(  is_null( $rating_id )  ){ return NULL; }
		$sql = "SELECT * FROM UserFeedbackRating WHERE (rating_id = ? ) LIMIT 1;";
		$params = array(  $rating_id );
		global $conn;
		$rs = $conn->GetRow($sql, $params);
		if(count($rs)==0) return NULL;
		$foo = new UserFeedbackRating( $rs );
		return $foo;
	}

	/**
	  *	Obtener todas las filas.
	  *
	  * Esta funcion leera todos los contenidos de la tabla en la base de datos y construira
	  * un vector que contiene objetos de tipo {@link UserFeedbackRating}. Tenga en cuenta que este metodo
	  * consumen enormes cantidades de recursos si la tabla tiene muchas filas.
	  * Este metodo solo debe usarse cuando las tablas destino tienen solo pequenas cantidades de datos o se usan sus parametros para obtener un menor numero de filas.
	  *
	  *	@static
	  * @param $pagina Pagina a ver.
	  * @param $columnas_por_pagina Columnas por pagina.
	  * @param $orden Debe ser una cadena con el nombre de una columna en la base de datos.
	  * @param $tipo_de_orden 'ASC' o 'DESC' el default es 'ASC'
	  * @return Array Un arreglo que contiene objetos del tipo {@link UserFeedbackRating}.
	  **/
	public static final function getAll( $pagina = NULL, $columnas_por_pagina = NULL, $orden = NULL, $tipo_de_orden = 'ASC' )
	{
		$sql = "SELECT * from UserFeedbackRating";
		if( ! is_null ( $orden ) )
		{ $sql .= " ORDER BY `" . $orden . "` " . $tipo_de_orden;	}
		if( ! is_null ( $pagina ) )
		{
			$sql .= " LIMIT " . (( $pagina - 1 )*$columnas_por_pagina) . "," . $columnas_por_pagina;
		}
		global $conn;
		$rs = $conn->Execute($sql);
		$allData = array();
		foreach ($rs as $foo) {
			$bar = new UserFeedbackRating($foo);
    		array_push( $allData, $bar);
		}
		return $allData;
	}

	/**
	  *	Buscar registros.
	  *
	  * Este metodo proporciona capacidad de busqueda para conseguir un juego de objetos {@link UserFeedbackRating} de la base de datos.
	  * Consiste en buscar todos los objetos que coinciden con las variables permanentes instanciadas de objeto pasado como argumento.
	  * Aquellas variables que tienen valores NULL seran excluidos en busca de criterios.
	  *
	  * <code>
	  *  /**
	  *   * Ejemplo de uso - buscar todos los clientes que tengan limite de credito igual a 20000
	  *   {@*}
	  *	  $cliente = new Cliente();
	  *	  $cliente->setLimiteCredito("20000");
	  *	  $resultados = ClienteDAO::search($cliente);
	  *
	  *	  foreach($resultados as $c ){
	  *	  	echo $c->nombre . "<br>";
	  *	  }
	  * </code>
	  *	@static
	  * @param UserFeedbackRating [$UserFeedbackRating] El objeto de tipo UserFeedbackRating
	  * @param $orderBy Debe ser una cadena con el nombre de una columna en la base de datos.
	  * @param $orden 'ASC' o 'DESC' el default es 'ASC'
	  **/
	public static final function search( $UserFeedbackRating , $orderBy = null, $orden = 'ASC', $offset = 0, $rowcount = NULL, $likeColumns = NULL)
	{
		if (!($UserFeedbackRating instanceof UserFeedbackRating)) {
			return self::search(new UserFeedbackRating($UserFeedbackRating));
		}

		$sql = "SELECT * from UserFeedbackRating WHERE (";
		$val = array();
		if (!is_null( $UserFeedbackRating->rating_id)) {
			$sql .= " `rating_id` = ? AND";
			array_push( $val, $UserFeedbackRating->rating_id );
		}
		if (!is_null( $UserFeedbackRating->user_id)) {
			$sql .= " `user_id` = ? AND";
			array_push( $val, $UserFeedbackRating->user_id );
		}
		if (!is_null( $UserFeedbackRating->problem_id)) {
			$sql .= " `problem_id` = ? AND";
			array_push( $val, $UserFeedbackRating->problem_id );
		}
		if (!is_null( $UserFeedbackRating->contest_id)) {
			$sql .= " `contest_id` = ? AND";
			array_push( $val, $UserFeedbackRating->contest_id );
		}
		if (!is_null( $UserFeedbackRating->create_date)) {
			$sql .= " `create_date` = ? AND";
			array_push( $val, $UserFeedbackRating->create_date );
		}
		if (!is_null( $UserFeedbackRating->raiting)) {
			$sql .= " `raiting` = ? AND";
			array_push( $val, $UserFeedbackRating->raiting );
		}
		if (!is_null($likeColumns)) {
			foreach ($likeColumns as $column => $value) {
				$escapedValue = mysql_real_escape_string($value);
				$sql .= "`{$column}` LIKE '%{$value}%' AND";
			}
		}
		if(sizeof($val) == 0) {
			return self::getAll();
		}
		$sql = substr($sql, 0, -3) . " )";
		if( ! is_null ( $orderBy ) ){
			$sql .= " ORDER BY `" . $orderBy . "` " . $orden;
		}
		// Add LIMIT offset, rowcount if rowcount is set
		if (!is_null($rowcount)) {
			$sql .= " LIMIT ". $offset . "," . $rowcount;
		}
		global $conn;
		$rs = $conn->Execute($sql, $val);
		$ar = array();
		foreach ($rs as $foo) {
			$bar =  new UserFeedbackRating($foo);
			array_push( $ar,$bar);
		}
		return $ar;
	}

	/**
	  *	Actualizar registros.
	  *
	  * @return Filas afectadas
	  * @param UserFeedbackRating [$UserFeedbackRating] El objeto de tipo UserFeedbackRating a actualizar.
	  **/
	private static final function update($UserFeedbackRating)
	{
		$sql = "UPDATE UserFeedbackRating SET  `user_id` = ?, `problem_id` = ?, `contest_id` = ?, `create_date` = ?, `raiting` = ? WHERE  `rating_id` = ?;";
		$params = array(
			$UserFeedbackRating->user_id,
			$UserFeedbackRating->problem_id,
			$UserFeedbackRating->contest_id,
			$UserFeedbackRating->create_date,
			$UserFeedbackRating->raiting,
			$UserFeedbackRating->rating_id, );
		global $conn;
		$conn->Execute($sql, $params);
		return $conn->Affected_Rows();
	}

	/**
	  *	Crear registros.
	  *
	  * Este metodo creara una nueva fila en la base de datos de acuerdo con los
	  * contenidos del objeto UserFeedbackRating suministrado. Asegurese
	  * de que los valores para todas las columnas NOT NULL se ha especificado
	  * correctamente. Despues del comando INSERT, este metodo asignara la clave
	  * primaria generada en el objeto UserFeedbackRating dentro de la misma transaccion.
	  *
	  * @return Un entero mayor o igual a cero identificando las filas afectadas, en caso de error, regresara una cadena con la descripcion del error
	  * @param UserFeedbackRating [$UserFeedbackRating] El objeto de tipo UserFeedbackRating a crear.
	  **/
	private static final function create( $UserFeedbackRating )
	{
		if (is_null($UserFeedbackRating->create_date)) $UserFeedbackRating->create_date = gmdate('Y-m-d H:i:s');
		$sql = "INSERT INTO UserFeedbackRating ( `rating_id`, `user_id`, `problem_id`, `contest_id`, `create_date`, `raiting` ) VALUES ( ?, ?, ?, ?, ?, ?);";
		$params = array(
			$UserFeedbackRating->rating_id,
			$UserFeedbackRating->user_id,
			$UserFeedbackRating->problem_id,
			$UserFeedbackRating->contest_id,
			$UserFeedbackRating->create_date,
			$UserFeedbackRating->raiting,
		 );
		global $conn;
		$conn->Execute($sql, $params);
		$ar = $conn->Affected_Rows();
		if($ar == 0) return 0;
 		$UserFeedbackRating->rating_id = $conn->Insert_ID();

		return $ar;
	}

	/**
	  *	Buscar por rango.
	  *
	  * Este metodo proporciona capacidad de busqueda para conseguir un juego de objetos {@link UserFeedbackRating} de la base de datos siempre y cuando
	  * esten dentro del rango de atributos activos de dos objetos criterio de tipo {@link UserFeedbackRating}.
	  *
	  * Aquellas variables que tienen valores NULL seran excluidos en la busqueda (los valores 0 y false no son tomados como NULL) .
	  * No es necesario ordenar los objetos criterio, asi como tambien es posible mezclar atributos.
	  * Si algun atributo solo esta especificado en solo uno de los objetos de criterio se buscara que los resultados conicidan exactamente en ese campo.
	  *
	  * <code>
	  *  /**
	  *   * Ejemplo de uso - buscar todos los clientes que tengan limite de credito
	  *   * mayor a 2000 y menor a 5000. Y que tengan un descuento del 50%.
	  *   {@*}
	  *	  $cr1 = new Cliente();
	  *	  $cr1->limite_credito = "2000";
	  *	  $cr1->descuento = "50";
	  *
	  *	  $cr2 = new Cliente();
	  *	  $cr2->limite_credito = "5000";
	  *	  $resultados = ClienteDAO::byRange($cr1, $cr2);
	  *
	  *	  foreach($resultados as $c ){
	  *	  	echo $c->nombre . "<br>";
	  *	  }
	  * </code>
	  *	@static
	  * @param UserFeedbackRating [$UserFeedbackRating] El objeto de tipo UserFeedbackRating
	  * @param UserFeedbackRating [$UserFeedbackRating] El objeto de tipo UserFeedbackRating
	  * @param $orderBy Debe ser una cadena con el nombre de una columna en la base de datos.
	  * @param $orden 'ASC' o 'DESC' el default es 'ASC'
	  **/
	public static final function byRange( $UserFeedbackRatingA , $UserFeedbackRatingB , $orderBy = null, $orden = 'ASC')
	{
		$sql = "SELECT * from UserFeedbackRating WHERE (";
		$val = array();
		if( ( !is_null (($a = $UserFeedbackRatingA->rating_id) ) ) & ( ! is_null ( ($b = $UserFeedbackRatingB->rating_id) ) ) ){
				$sql .= " `rating_id` >= ? AND `rating_id` <= ? AND";
				array_push( $val, min($a,$b));
				array_push( $val, max($a,$b));
		}elseif( !is_null ( $a ) || !is_null ( $b ) ){
			$sql .= " `rating_id` = ? AND";
			$a = is_null ( $a ) ? $b : $a;
			array_push( $val, $a);
		}

		if( ( !is_null (($a = $UserFeedbackRatingA->user_id) ) ) & ( ! is_null ( ($b = $UserFeedbackRatingB->user_id) ) ) ){
				$sql .= " `user_id` >= ? AND `user_id` <= ? AND";
				array_push( $val, min($a,$b));
				array_push( $val, max($a,$b));
		}elseif( !is_null ( $a ) || !is_null ( $b ) ){
			$sql .= " `user_id` = ? AND";
			$a = is_null ( $a ) ? $b : $a;
			array_push( $val, $a);
		}

		if( ( !is_null (($a = $UserFeedbackRatingA->problem_id) ) ) & ( ! is_null ( ($b = $UserFeedbackRatingB->problem_id) ) ) ){
				$sql .= " `problem_id` >= ? AND `problem_id` <= ? AND";
				array_push( $val, min($a,$b));
				array_push( $val, max($a,$b));
		}elseif( !is_null ( $a ) || !is_null ( $b ) ){
			$sql .= " `problem_id` = ? AND";
			$a = is_null ( $a ) ? $b : $a;
			array_push( $val, $a);
		}

		if( ( !is_null (($a = $UserFeedbackRatingA->contest_id) ) ) & ( ! is_null ( ($b = $UserFeedbackRatingB->contest_id) ) ) ){
				$sql .= " `contest_id` >= ? AND `contest_id` <= ? AND";
				array_push( $val, min($a,$b));
				array_push( $val, max($a,$b));
		}elseif( !is_null ( $a ) || !is_null ( $b ) ){
			$sql .= " `contest_id` = ? AND";
			$a = is_null ( $a ) ? $b : $a;
			array_push( $val, $a);
		}

		if( ( !is_null (($a = $UserFeedbackRatingA->create_date) ) ) & ( ! is_null ( ($b = $UserFeedbackRatingB->create_date) ) ) ){
				$sql .= " `create_date` >= ? AND `create_date` <= ? AND";
				array_push( $val, min($a,$b));
				array_push( $val, max($a,$b));
		}elseif( !is_null ( $a ) || !is_null ( $b ) ){
			$sql .= " `create_date` = ? AND";
			$a = is_null ( $a ) ? $b : $a;
			array_push( $val, $a);
		}

		if( ( !is_null (($a = $UserFeedbackRatingA->raiting) ) ) & ( ! is_null ( ($b = $UserFeedbackRatingB->raiting) ) ) ){
				$sql .= " `raiting` >= ? AND `raiting` <= ? AND";
				array_push( $val, min($a,$b));
				array_push( $val, max($a,$b));
		}elseif( !is_null ( $a ) || !is_null ( $b ) ){
			$sql .= " `raiting` = ? AND";
			$a = is_null ( $a ) ? $b : $a;
			array_push( $val, $a);
		}

		$sql = substr($sql, 0, -3) . " )";
		if( !is_null ( $orderBy ) ){
		    $sql .= " order by `" . $orderBy . "` " . $orden ;
		}
		global $conn;
		$rs = $conn->Execute($sql, $val);
		$ar = array();
		foreach ($rs as $row) {
			array_push( $ar, $bar = new UserFeedbackRating($row));
		}
		return $ar;
	}

	/**
	  *	Eliminar registros.
	  *
	  * Este metodo eliminara la informacion de base de datos identificados por la clave primaria
	  * en el objeto UserFeedbackRating suministrado. Una vez que se ha suprimido un objeto, este no
	  * puede ser restaurado llamando a save(). save() al ver que este es un objeto vacio, creara una nueva fila
	  * pero el objeto resultante tendra una clave primaria diferente de la que estaba en el objeto eliminado.
	  * Si no puede encontrar eliminar fila coincidente a eliminar, Exception sera lanzada.
	  *
	  *	@throws Exception Se arroja cuando el objeto no tiene definidas sus llaves primarias.
	  *	@return int El numero de filas afectadas.
	  * @param UserFeedbackRating [$UserFeedbackRating] El objeto de tipo UserFeedbackRating a eliminar
	  **/
	public static final function delete( $UserFeedbackRating )
	{
		if( is_null( self::getByPK($UserFeedbackRating->rating_id) ) ) throw new Exception('Campo no encontrado.');
		$sql = "DELETE FROM UserFeedbackRating WHERE  rating_id = ?;";
		$params = array( $UserFeedbackRating->rating_id );
		global $conn;

		$conn->Execute($sql, $params);
		return $conn->Affected_Rows();
	}
}
