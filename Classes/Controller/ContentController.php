<?php
namespace FluidTYPO3\TestProviderExtension\Controller;

use FluidTYPO3\Flux\Controller\AbstractFluxController;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\TemplateView;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Class ContentController
 */
class ContentController extends AbstractFluxController
{
    public function sectionObjectAsGridAction()
    {
        return $this->createHtmlResponse($this->view->render());
    }

    public function columnsAction()
    {
        return $this->createHtmlResponse($this->view->render());
    }

    public function testsAction()
    {
        $results = $this->runTests();
        $this->view->assign('results', $results);
        return $this->createHtmlResponse($this->view->render());
    }

    private function runTests(): array
    {
        $partialsPath = ExtensionManagementUtility::extPath('test_provider_extension', 'Resources/Private/Partials/Tests/');
        $pathLength = strlen($partialsPath);
        $directoryIterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($partialsPath, \FilesystemIterator::SKIP_DOTS));
        $array = ['a', 'b', 'c', 1, 2, 3];
        $sampleIterator = new \ArrayIterator($array);

        $variables = [
            'iterator' => $sampleIterator,
            'array' => $array,
        ];

        $results = [];

        /** @var \SplFileInfo $file */
        foreach ($directoryIterator as $file) {
            if ($file->getExtension() === 'txt') {
                continue;
            }

            $relativeFileName = substr((string)$file, $pathLength, -5);

            $view = $this->resolveView();
            $view->getTemplatePaths()->fillDefaultsByPackageName('test_provider_extension');
            $view->getTemplatePaths()->setFormat('html');

            $output = trim($view->renderPartial('Tests/' . $relativeFileName, null, $variables));

            [$success, $message] = $this->matchExpectation($view, $relativeFileName, $variables, $output);

            $results[] = [
                'file' => $relativeFileName,
                'output' => $output,
                'message' => $message,
                'success' => $success,
            ];
        }

        return $results;
    }

    private function matchExpectation(ViewInterface $view, string $relativeFileName, array $variables, string $output): array
    {
        switch ($relativeFileName) {
            case 'Page/Header/Alternate':
                $success = true;
                $message = '';
                break;
            case 'Page/Link':
                $success = strpos($output, '<a') !== false && strpos($output, '>test<') !== false;
                $message = $success ? '' : 'Generated link is invalid: ' . $output;
                break;
            case 'Render/Uncache':
                $success = strpos($output, '<!--INT_SCRIPT.') === 0;
                $message = $success ? '' : 'Output is not an int script: ' . $output;
                break;
            default:
                $expected = trim($view->renderPartial('Tests/' . $relativeFileName . '.txt', null, $variables));
                $message = $expected ? '' : 'Expected: ' . var_export($expected, true) . '. Encountered: ' . var_export($output, true);
                $success = $output == $expected;
                break;
        }

        return [$success, $message];
    }
}
