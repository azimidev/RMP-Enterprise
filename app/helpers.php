<?php

if ( ! function_exists('sort_column_by')) {
	/**
	 * Sorting tabulate data
	 *
	 * @param $column
	 * @param $body
	 * @return string
	 */
	function sort_column_by($column, $body)
	{
		$direction = (request('direction') === 'asc') ? 'desc' : 'asc';

		$route = route(
			request()->route()->getAction()['as'],
			['sortBy' => $column, 'direction' => $direction]
		);

		return "<a title=\"Sort by {$column}\" href=\"{$route}\">{$body}" . sort_column_icon($column) . '</a>';
	}
}

if ( ! function_exists('sort_column_icon')) {
	/**
	 * Sorting tabulate data icon
	 *
	 * @param $column
	 * @return string
	 */
	function sort_column_icon($column)
	{
		if (request('sortBy') !== $column) return null;

		if (request('direction') === 'desc') {
			return '<i class="fa fa-chevron-down fa-fw"></i>';
		}
		if (request('direction') === 'asc') {
			return '<i class="fa fa-chevron-up fa-fw"></i>';
		}
	}
}
