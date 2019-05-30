<?php

declare( strict_types = 1 );
namespace WaughJ\PHPAutoload;

use WaughJ\Directory\Directory;
use WaughJ\File\File;

class PHPAutoload
{
	public function __construct( $directory )
	{
		$this->directory = new Directory( $directory );
	}

	public function loadAll() : void
	{
		$this->load( $this->directory->getString() );
	}

	private function load( string $directory ) : void
	{
		$file_list = scandir( $directory );
		foreach ( $file_list as $file_item )
		{
			if ( $file_item !== '' && $file_item !== '.' && $file_item !== '..' )
			{
				$file = new File( $file_item, null, $directory );
				$filename = $file->getFullFilename();
				if ( is_dir( $filename ) )
				{
					$this->load( $filename );
				}
				else
				{
					require_once( $filename );
				}
			}
		}
	}

	private $directory;
}
