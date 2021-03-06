<?php
/**
 * TimerangeTV Input Render
 *
 * @package timerangetv
 * @subpackage input_render
 */

class TimerangeInputRender extends modTemplateVarInputRender
{
    /**
     * Return the template path to load
     *
     * @return string
     */
    public function getTemplate()
    {
        $corePath = $this->modx->getOption('timerangetv.core_path', null, $this->modx->getOption('core_path') . 'components/timerangetv/');
        return $corePath . 'elements/tv/input/tpl/timerange.render.tpl';
    }

    /**
     * Get lexicon topics
     *
     * @return array
     */
    public function getLexiconTopics()
    {
        return array('timerangetv:default');
    }

    /**
     * Process Input Render
     *
     * @param string $value
     * @param array $params
     * @return void
     */
    public function process($value, array $params = array())
    {
        // set timerange value
        $timerange = array();
        if (strpos($value, '||')) {
            $timerange = explode('||', $value);
        } else {
            $timerange[0] = $value;
        }
        $this->setPlaceholder('timerange', $timerange);

        // add lexicon topic
        $this->modx->controller->addLexiconTopic('timerangetv:tvrenders');

        // set params
        $params['allowBlank'] = ($params['allowBlank'] === 'false' || $params['allowBlank'] === 0 || $params['allowBlank'] === false) ? 'false' : 'true';
        $this->setPlaceholder('params', $params);
    }
}

return 'TimerangeInputRender';
