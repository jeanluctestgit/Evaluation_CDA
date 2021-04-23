<?php
/**
 * Created by iKNSA.
 * User: Khalid Sookia <khalidsookia@gmail.com>
 * Date: 20/04/2021
 * Time: 11:51
 */


namespace Simplex\Service;


use Simplex\Exceptions\ClassNotFoundException;
use Simplex\Exceptions\FileNotFoundException;
use Symfony\Component\HttpFoundation\Request;

class Form
{
    public static function handleSubmit(Request $request)
    {
        foreach ($request->request->all() as $module => $model) {
            foreach ($model as $className => $data) {

                try {
                    if (!file_exists(
                        $request->attributes->get('_app_root') . $module . '/Model/' . $className . '.php'
                    )) {
                        throw new FileNotFoundException();
                    }
                } catch (FileNotFoundException $e) {
                    dd($e);
                }

                $class = $module . '\\Model\\' . $className;

                try {
                    if (!class_exists($class)) {
                        throw new ClassNotFoundException();
                    }
                } catch (ClassNotFoundException $e) {
                    dd($e);
                }

                $object = new $class;

                return Hydrator::hydrate($object, $data);
            }
        }

        return null;
    }
}
