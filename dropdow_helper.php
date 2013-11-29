<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// ------------------------------------------------------------------------

/**
 * CodeIgniter DropDow Helpers
 *
 * @package		CodeIgniter - Edyonil
 * @subpackage	Helpers
 * @category	Helpers
 * @author		edyonil@gmail.com
 */

// ------------------------------------------------------------------------

/**
 * DropDow Generico
 * Função que permite montar os um array no formato especifico do CodeIgniter
 * Essa função obtem a tabela, seu id e o nome que deseja para op dropdown
 *
 * @access	public
 * @param	string
 * @param	string
 * @param	string
 * @return	string
 */

if (!function_exists('genericDropDow')) {
	function genericDropDow($table, $value, $decription) {
		
		if(is_null($table) || is_null($value) || is_null($decription)){
			return false;
		};
		$CI =& get_instance();

		$resultado = $CI->db
					->select($value .','. $decription)
					->get($table);
		if($resultado->num_rows() > 0) {
			$drop[''] = "&nbsp;";
			foreach($resultado->result() as $r){
				$drop[$r->$value] = $r->$decription;
			}
		return $drop;
		}
		return false;
	}
}

