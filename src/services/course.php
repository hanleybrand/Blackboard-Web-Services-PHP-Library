<?php

    /**
     * BbPHP: Blackboard Web Services Library for PHP
     * Copyright (C) 2011 by St. Edward's University (www.stedwards.edu)
     *
     * Licensed under The MIT License
     * Redistributions of files must retain the above copyright notice.
     *
     * This is a stub class for service calls made under the Course service.
     *
     * @author johns
     *
     */
    class Course extends Service
    {

        public function getCourse($args)
        {
            $body = '<ns1:filter xmlns:ns2="http://course.ws.blackboard/xsd">';

            foreach ($args as $key => $arg) {
                $body .= '<ns2:' . $key . '>' . $arg . '</ns2:' . $key . '>';
            }

            $body .= '</ns1:filter>';

            return parent::buildBody("getCourse", "Course", $body);
        }

        public function getGroup($args) {
            $course_id = '';

            foreach ($args as $key => $val) {
                if ($key == 'courseId') $course_id = $val;
                if ($key == 'filter') $filter = $val;
            }

            $body = '<ns1:courseId>' . $course_id . '</ns1:courseId>';

            if (isset($filter) && is_array($filter)) {
                $body .= '<ns1:filter>';

                foreach ($filter as $key => $val) {
                    $body .= '<ns1:' . $key . '>' . $val . '</ns1:' . $key . '>';
                }
                $body .= '</ns1:filter>';
            }

            return parent::buildBody("getGroup", "Course", $body);
        }

        public function saveGroup($args) {
            $course_id = '';

            foreach ($args as $key => $val) {
                if ($key == 'courseId') $course_id = $val;
                if ($key == 'vo' || gettype($key) == "array") $vo = $val;
            }

            $body = '<ns1:courseId>' . $course_id . '</ns1:courseId>';

            if (isset($vo) && is_array($vo)) {
                $body .= '<ns1:vo>';

                foreach ($vo as $key => $val) {
                    //if(gettype($val == "boolean"))  $val = ($val) ? 'true' : 'false';
                    $body .= '<ns1:' . $key . '>' . $val . '</ns1:' . $key . '>';
                }
                $body .= '</ns1:vo>';
            }

            return parent::buildBody("saveGroup", "Course", $body);
        }

        public function __call($method, $args = null)
        {
            return parent::buildBody($method, "Course", $args[0]);
        }
    }

?>